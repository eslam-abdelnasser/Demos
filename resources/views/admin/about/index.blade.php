@extends('admin.layout')

@section('title', 'Services')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Services')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Services')

@section('page_description','Edit Services that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Edit Service </div>
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
                            {{Form::open(['route' => ['admin.about.update',$about->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">
                                @foreach($about->description as $description)

                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$description->language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$description->language->name}} Title</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_{{$description->language->label}}" value="{{$description->title}}" id="title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="Title"> </div>
                                                </div>



                                                <div class="form-group">
                                                    <label>{{$description->language->name}} Description</label>
                                                    <div class="input-group">

                                                <textarea class="my-editor" name="description_{{$description->language->label}}" id="description_{{$description->language->label}}" placeholder="Description">
                                                     {{$description->description}}
                                                </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{$description->language->name}} Meta title</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="meta_title_{{$description->language->label}}" value="{{$description->meta_title}}" id="meta_title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="Meta title"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{$description->language->name}} Meta Description</label>

                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="meta_description_{{$description->language->label}}" value="{{$description->meta_description}}" id="meta_description_{{$description->language->label}}" class="form-control input-circle-right" placeholder="Meta description"> </div>
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