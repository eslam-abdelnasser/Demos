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