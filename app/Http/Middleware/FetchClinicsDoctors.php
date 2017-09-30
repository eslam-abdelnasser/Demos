<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Doctor ;
use App\Models\Clinic ;
use Lang ;
class FetchClinicsDoctors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $clinics = Clinic::where('status','=','1')->get();
        $doctors = Doctor::where('status','=','1')->get();

        foreach($doctors as $doctor){
            foreach($doctor->description as $description){
                if(strpos(url()->current() , $description->language->label)){
                    $data[$doctor->clinic_id][] =['name'=> $description->name ,'doctor_id'=> $doctor->id];
                }elseif(Lang::getLocale()  == $description->language->label ){
                    $data[$doctor->clinic_id][] =['name'=> $description->name ,'doctor_id'=> $doctor->id];
                }
            }
        }

        view()->share(['clinics'=>$clinics, 'clinics_doctors'=>$data]);
        return $next($request);
    }
}
