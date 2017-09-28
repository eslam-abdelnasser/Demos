<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\AboutUs ;
use App\Models\Social ;
use App\Models\Blog ;
use App\Models\Clinic ;
use App\Models\Doctor ;
use LaravelLocalization ;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $social = Social::where('status','=','1')->get();
        $about_us = AboutUs::find(1);
        $general_setting= GeneralSetting::find(1);
        $clinics = Clinic::where('status','=','1')->get();
        $doctors = Doctor::where('status','=','1')->get();

        foreach($doctors as $doctor){
            foreach($doctor->description as $description){
                if(strpos(url()->current() , $description->language->label)){
                    $data[$doctor->clinic_id][] = $description->name ;
                }
            }
        }

//        dd($data);

        return view()->share(['setting'=>$general_setting , 'about_us'=>$about_us,'social'=>$social, 'clinics'=>$clinics]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
