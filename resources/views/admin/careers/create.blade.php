@extends('admin.layout')

@section('title', 'Career')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Career')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Career')

@section('page_description','Add Career that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Career </div>
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
                            {{Form::open(['route' => ['careers.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$language->name}} Title</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_{{$language->label}}" value="{{old('title_'.$language->label)}}" id="title_{{$language->label}}" class="form-control input-circle-right" placeholder="Title"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{$language->name}} Meta title</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="meta_title_{{$language->label}}" value="{{old('meta_title_'.$language->label)}}" id="meta_title_{{$language->label}}" class="form-control input-circle-right" placeholder="Meta title"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{$language->name}} slug</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="slug_{{$language->label}}" value="{{old('slug_'.$language->label)}}" id="slug_{{$language->label}}" class="form-control input-circle-right" placeholder="Slug"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{$language->name}} Description</label>
                                                    <div class="input-group">

                                                <textarea class="my-editor" name="description_{{$language->label}}" id="description_{{$language->label}}" placeholder="Description">
                                                     {{old('description_'.$language->label)}}
                                                </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{$language->name}} Meta Description</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="meta_description_{{$language->label}}" value="{{old('meta_description_'.$language->label)}}" id="meta_description_{{$language->label}}" class="form-control input-circle-right" placeholder="Meta description"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="portlet light ">

                                <div class="form-group">
                                    <label>Career Status</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{old('status') == 1 ? 'selected' : ''}} >Enable</option>
                                            <option value="0" {{old('status') == 0 ? 'selected' : ''}} >Disable</option>
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


{{-- Start javascript --}}
@section('js')
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>
        @foreach($languages as $language)
          $("#title_{{$language->label}}").on('change', function (e) {

            $("#slug_{{$language->label}}").val($("#title_{{$language->label}}").val());
        });

        @endforeach
    </script>
@endsection

{{-- end javascript --}}