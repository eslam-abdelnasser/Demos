@extends('admin.layout')

@section('title', 'Languages')

{{-- start css --}}
@section('css')
    {{--<link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />--}}

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
                    <i class="fa fa-gift"></i>Add Service </div>
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
                                            <label>{{$language->name}} Title</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <input type="text" name="title_{{$language->label}}" id="title_{{$language->label}}" class="form-control input-circle-right" placeholder="Title"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{$language->name}} Meta Title</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <input type="text" name="meta_title_{{$language->label}}" id="meta_title_{{$language->label}}" class="form-control input-circle-right" placeholder="Title"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{$language->name}} Description</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <textarea class="my-editor" name="description_{{$language->label}}" id="description_{{$language->label}}" placeholder="Description">

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{$language->name}} Meta Description</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <input type="text" name="meta_description_{{$language->label}}" id="meta_description_{{$language->label}}" class="form-control input-circle-right" placeholder="Title"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="portlet light bordered">
                            <div class="form-group">
                                <label>Service Icone</label>
                                <div class="input-group margin-top-10">
                                <span class="input-group-addon">
                                        <i class="fa fa-image"></i>
                                  </span>
                                    <input type="text" class="form-control" name="icon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Service Image</label>
                                <div class="input-group margin-top-10">
                                    <div class="col-md-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img name="image_url" id="image_url" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="image_url" id="image_url"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="form-group">
                                <label>Service Home Page Status</label>
                                <div class="input-group margin-top-10">
                                    <select class="form-control input-medium" name="homepage_status">
                                        <option disabled> </option>
                                        <option value="0" >Display On Home Page</option>
                                        <option value="1" >Not Display On Home Page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Service Status</label>
                                <div class="input-group margin-top-10">
                                    <select class="form-control input-medium" name="status">
                                        <option disabled> </option>
                                        <option value="0" >Enable</option>
                                        <option value="1" >Disable</option>
                                    </select>
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

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}