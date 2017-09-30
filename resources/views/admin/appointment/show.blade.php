@extends('admin.layout')

@section('title', trans('admin/appointment.appointments'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

@section('home','dashboard')
@section('page_title',trans('admin/appointment.appointments'))


@section('content')

    <div class="portlet green-meadow box">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>{{trans('admin/appointment.appointment_details')}} </div>
        </div>
        <div class="portlet-body">
            <div class="row static-info">
                <div class="col-md-12 value"> {{trans('admin/appointment.name')}} : {{$appointment->name}}
                    <br>{{trans('admin/appointment.phone')}} :  {{$appointment->phone}}
                    <br>{{trans('admin/appointment.email')}} : {{$appointment->email}}<br>
                    <br> {{trans('admin/appointment.message')}}
                    <br> <p>{{$appointment->message}}</p>
                    <br> {{trans('admin/appointment.seen_by')}} :<span class="label label-sm label-success">{{$name}}</span>
                    <br> {{trans('admin/appointment.doctor')}} :
                    @foreach($doctors as $doctor)
                        @if($doctor->language->label == LaravelLocalization::getCurrentLocale())
                        {{$doctor->name}}
                        @endif
                    @endforeach
                    <br> {{trans('admin/appointment.clinic')}} :
                    @foreach($clinics as $clinic)
                        @if($clinic->language->label == LaravelLocalization::getCurrentLocale())
                            {{$clinic->title}}
                        @endif
                    @endforeach
                    <br> </div>
            </div>
        </div>
    </div>

@endsection

{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}