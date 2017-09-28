<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
use App\Models\Doctor ;
use App\Models\DoctorDescription ;
use Image ;
use File ;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();

        return view('admin.doctors.index')->with('doctors',$doctors);
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
        $clinics = Clinic::where('status','=','1')->get();
        return view('admin.doctors.create')->withLanguages($languages)->withClinics($clinics);
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
            'status' => 'required',
            'clinic_id' => 'required'
        ];
        foreach ($languages as  $language){
            $rules['name_'.$language->label] = 'required|max:255';
            $rules['job_title_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $doctor = new Doctor();
        $doctor->status = $request->status;
        $doctor->clinic_id = $request->clinic_id ;

        //upload image to server directory to service
        $dir = public_path().'/uploads/doctors/275x370/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(275, 370)->save($dir. $fileName);
        $doctor->image_url = $fileName ;



        $doctor->save();

        foreach ($languages as $language){
            $clinicDescription = new DoctorDescription();
            $clinicDescription->lang_id = $language->id;
            $clinicDescription->doctor_id = $doctor->id;

            $clinicDescription->name = $request->get('name_'.$language->label);
            $clinicDescription->job_title = $request->get('job_title_'.$language->label);

            $clinicDescription->save();
        }
        session()->flash('message','Doctor Added successfully');
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
        $doctor = Doctor::find($id);
        $clinics = Clinic::where('status','=','1')->get();
        $languages = Language::where('status','=','1')->get();
        return view('admin.doctors.edit')->withClinics($clinics)->withDoctor($doctor)->withLanguages($languages);
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

            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['name_'.$language->label] = 'required|max:255';
            $rules['job_title_'.$language->label] = 'required|max:255';

        }


        $this->validate($request,$rules);

        $docotr = Doctor::find($id);
        $docotr->clinic_id = $request->clinic_id;
        $docotr->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/doctors/';
            File::delete($dir . $docotr->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(275, 370)->save($dir.'275x370/'.$fileName);
//            Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
            $docotr->image_url = $fileName ;
        }

        $docotr->save();


        foreach ($languages as $language){
            foreach($docotr->description  as $description){

                if($description->lang_id == $language->id){
                    $description->name = $request->get('name_'.$language->label);
                    $description->job_title = $request->get('job_title_'.$language->label);
                    $description->save();
                }

            }

        }
        session()->flash('message','Doctor Updated successfully');
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
        Doctor::destroy($id);
        session()->flash('message','Doctor deleted successfully');
        return redirect()->back();
    }


    public function destroyAll(Request $request){

//        dd($request);

        Doctor::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected doctors deleted successfully');
        return redirect()->back();


    }
}
