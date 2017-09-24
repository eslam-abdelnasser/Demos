@extends('admin.layout')

@section('title', 'Services')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Docotors')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Doctors')

@section('page_description','Edit Doctors that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Edit Docotr </div>
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
                            {{Form::open(['route' => ['doctors.update',$doctor->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">
                                @foreach($doctor->description as $description)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$description->language->name}}">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$description->language->name}} Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="name_{{$description->language->label}}" value="{{$description->name}}" id="name_{{$description->language->label}}" class="form-control input-circle-right" placeholder="Name"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{$description->language->name}} Job title</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="job_title_{{$description->language->label}}" value="{{$description->job_title}}" id="job_title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="Job title"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>

                            <div class="portlet light ">


                                <div class="form-group">
                                    <label>Select Clinic</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="clinic_id">
                                            @foreach($clinics as $clinic)
                                                @foreach($clinic->description as $description)
                                                    @if($description->language->label  == LaravelLocalization::getCurrentLocale() )
                                                        <option value="{{$clinic->id}}" {{$clinic->id == $doctor->clinic_id ? 'selected' : ''}} >{{$description->title}}</option>
                                                    @endif
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{$doctor->status == 1 ? 'selected' : ''}} >Enable</option>
                                            <option value="0" {{$doctor->status == 0 ? 'selected' : ''}} >Disable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Upload Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{asset('uploads/doctors/'.$doctor->image_url)}}" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="image_url"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

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
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
@endsection

{{-- end javascript --}}