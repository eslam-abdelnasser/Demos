<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\MedicalEquipment;
use App\Models\MedicalEquipmentDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image ;
use File;

class MedicalEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medical_equipments = MedicalEquipment::all();
        return view('admin.medical_equipments.index')->with('medical_equipments',$medical_equipments);
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
        return view('admin.medical_equipments.create')->with('languages',$languages);
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

        $medical = new MedicalEquipment();
        $medical->home_page_status = $request->homepage_status;
        $medical->status = $request->status;

        //upload image to server directory to service
        $dir = public_path().'/uploads/medical_equipments/540x370/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir. $fileName);
        $medical->image_url = $fileName ;



//        $service->image_url = time().$request->image_url;
        $medical->save();

        foreach ($languages as $language){
            $medicalDescription = new MedicalEquipmentDescription();
            $medicalDescription->lang_id = $language->id;
            $medicalDescription->medical_equipment_id = $medical->id;

            $medicalDescription->title = $request->get('title_'.$language->label);
            $medicalDescription->slug = $request->get('slug_'.$language->label);
            $medicalDescription->meta_title = $request->get('meta_title_'.$language->label);
            $medicalDescription->description = $request->get('description_'.$language->label);
            $medicalDescription->meta_description = $request->get('meta_description_'.$language->label);
            $medicalDescription->save();
        }
        session()->flash('message','your Medical Equipment Added successfully');
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
        $medical_equipment = MedicalEquipment::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.medical_equipments.edit')->with('medical_equipment',$medical_equipment)->with('languages',$languages);
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
        }


        $this->validate($request,$rules);

        $medical = MedicalEquipment::find($id);
        $medical->home_page_status = $request->homepage_status;
        $medical->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/medical_equipments/540x370/';
            File::delete($dir . $medical->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir. $fileName);
            $medical->image_url = $fileName ;
        }

        $medical->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($medical->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->medical_equipment_id = $medical->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Medical Equipment Updated successfully');
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
        MedicalEquipment::destroy($id);
        session()->flash('message','Medical Equipment deleted successfully');
        return redirect()->back();
    }
    public function destroyAll(Request $request){

        MedicalEquipment::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Medical Equipments deleted successfully');
        return redirect()->back();
    }
}
