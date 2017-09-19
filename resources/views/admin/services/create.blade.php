@extends('admin.layout')

@section('title', 'Languages')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Languages')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Languages')

@section('page_description','Add Languages that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Left Tabs </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <ul class="nav nav-tabs tabs-left">


                            @foreach($languages as $language)
                            <li class="{{$loop->iteration == 1 ? 'active' : ''}}">
                                <a href="#{{$language->name}}" data-toggle="tab"> {{$language->name}} </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        {{Form::open(['route' => ['services.store'] , 'method' => 'post']) }}
                        <div class="tab-content">

                            @foreach($languages as $language)
                            <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                <div class="portlet-body form">

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Name {{$language->name}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <input type="text" name="name_{{$language->label}}" id="name" class="form-control input-circle-right" placeholder="Name"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                            <textarea class="my-editor"></textarea>
                                            </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                                <input type="password" name="password" id="password" class="form-control input-circle-right" placeholder="Confirm Password"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <div class="input-group">
                                                            <span class="input-group-addon input-circle-left">
                                                                <i class="fa fa-lock"></i>
                                                            </span>
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-circle-right" placeholder="Confirm Password"> </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                <input type="text" name="phone" id="phone" class="form-control input-circle-right" placeholder="Phone"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-briefcase"></i>
                                                        </span>
                                                <input type="text" name="job_title" id="job_title" class="form-control input-circle-right" placeholder="Job Title"> </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn blue">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}