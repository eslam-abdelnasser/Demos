<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Appointment ;
class notificationPatient
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
        $appointments = Appointment::where('seen','=','0')->get();

//        dd($appointments);
        view()->share(['appointments_notification'=>$appointments]);
        return $next($request);
    }
}
