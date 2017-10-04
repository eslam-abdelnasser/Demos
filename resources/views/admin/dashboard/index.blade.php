@extends('admin.layout')

@section('title', 'Dashboard')

    {{-- start css --}}
@section('css')

@endsection
    {{-- end css --}}

    {{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Dashboard')


  {{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_title','Dashboard')

@section('description','Statistics, chart , and all users activities on your website')

{{-- end page title --}}


@section('content')
    <div class="row">

        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{{route('appointments.index')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$appointments}}">0</span>
                    </div>
                    <div class="desc"> {{trans('front.appointment')}} </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{route('contact-us.index')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$messages}}"></span> </div>
                    <div class="desc"> {{trans('front.message')}} </div>
                </div>
            </a>
        </div>

        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{route('doctors.index')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$doctors}}">0</span>
                    </div>
                    <div class="desc"> {{trans('front.our_doctors')}} </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{route('clinics.index')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$clinics}}">0</span> </div>
                    <div class="desc"> {{trans('front.clinics')}} </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow" href="{{route('medical_equipments.index')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$equipments}}"></span> </div>
                    <div class="desc"> {{trans('front.medical_equipments')}} </div>
                </div>
            </a>
        </div>

    </div>

@endsection


{{-- Start javascript --}}
@section('js')

 @endsection

{{-- end javascript --}}