<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
use App\Models\Clinic ;
use App\Models\ClinicDescription ;
use Image ;
use File ;
class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clinics = Clinic::all();
        return view('admin.clinics.index')->with('clinics',$clinics);
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

        return view('admin.clinics.create')->withLanguages($languages);
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
            'image_url' => 'required',
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $clinic = new Clinic();
        $clinic->home_page_status = $request->homepage_status;
        $clinic->status = $request->status;

        //upload image to server directory to service
        $dir = public_path().'/uploads/clinics/540x370/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir.$fileName);
        $clinic->image_url = $fileName ;



//        $service->image_url = time().$request->image_url;
        $clinic->save();

        foreach ($languages as $language){
            $clinicDescription = new ClinicDescription();
            $clinicDescription->lang_id = $language->id;
            $clinicDescription->clinic_id = $clinic->id;

            $clinicDescription->title = $request->get('title_'.$language->label);
            $clinicDescription->slug = $request->get('slug_'.$language->label);
            $clinicDescription->description = $request->get('description_'.$language->label);
            $clinicDescription->meta_title = $request->get('meta_title_'.$language->label);
            $clinicDescription->meta_description = $request->get('meta_description_'.$language->label);
            $clinicDescription->save();
        }
        session()->flash('message','Clinic Added successfully');
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
        $clinic = Clinic::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.clinics.edit')->withClinic($clinic)->withLanguages($languages);
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
        $languages = Language::where('status','=','1')->get();
        $rules = [
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $clinic = Clinic::find($id);
        $clinic->home_page_status = $request->homepage_status;
        $clinic->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/clinics/540x370/';
            File::delete($dir . $clinic->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.$fileName);
            $clinic->image_url = $fileName ;
        }

        $clinic->save();


        foreach ($languages as $language){
            foreach($clinic->description  as $description){

                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->service_id = $clinic->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->description = $request->get('meta_title_'.$language->label);
                    $description->meta_title = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }

            }

        }
        session()->flash('message','Clinic Updated successfully');
        return redirect()->back();
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
        Clinic::destroy($id);
        session()->flash('message','Clinic deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

//        dd($request);

        Clinic::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected clinics deleted successfully');
        return redirect()->back();


    }
}
