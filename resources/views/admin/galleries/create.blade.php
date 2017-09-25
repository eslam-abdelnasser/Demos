@extends('admin.layout')

@section('title','Gallery')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Gallery')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Gallery')

@section('page_description','Add Gallery that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Gallery </div>
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
                            {{Form::open(['route' => ['galleries.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$language->name}} Gallery name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="name_{{$language->label}}" value="{{old('name_'.$language->label)}}" id="name_{{$language->label}}" class="form-control input-circle-right" placeholder="Name"> </div>
                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="portlet light ">


                                <div class="form-group">
                                    <label>Clinic Home Page Status</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="homepage_status">

                                            <option value="1" {{old('homepage_status') == 1 ? 'selected' : ''}} >Display On Home Page</option>
                                            <option value="0" {{old('homepage_status') == 0 ? 'selected' : ''}}>Not Display On Home Page</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>gallery Status</label>
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


@endsection

{{-- end javascript --}}