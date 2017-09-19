<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
use App\Models\Service ;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('admin.services.index')->with('services',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::where('status','=','1')->get();

        return view('admin.services.create')->withLanguages($languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $languages = Language::where('status','=','1')->get();
        $rules = [
            'icon' => 'required',
            'image_url' => 'required|mimes:jpg,jpeg,png,dmp',
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $service = new Service();
        $service->icon = $request->icon;
        $service->home_page_status = $request->homepage_status;
        $service->status = $request->status;

        $service->image_url = time().$request->image_url;
        $service->save();

        foreach ($languages as $language){
            $serviceDescription = new ServiceDescription();
            $serviceDescription->lang_id = $language->id;
            $serviceDescription->service_id = $service->id;

            $serviceDescription->title = $request->get('title_'.$language->label);
            $serviceDescription->description = $request->get('meta_title_'.$language->label);
            $serviceDescription->meta_title = $request->get('description_'.$language->label);
            $serviceDescription->meta_description = $request->get('meta_description_'.$language->label);
            $serviceDescription->slug = "Slug Here";
          $serviceDescription->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
