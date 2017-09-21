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
                        <i class="fa fa-gift"></i>Edite Question </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <ul class="nav nav-tabs tabs-left">

                                    <li class="active">
                                        <a href="#{{$faq->language->name}}" data-toggle="tab"> {{$faq->language->name}} </a>
                                    </li>

                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['faqs.update',$faq->id] , 'method' => 'put']) }}
                            <div class="tab-content">

                                    <div class="tab-pane active" id="{{$faq->language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$faq->language->name}} Question</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">

                                                        </span>
                                                        <input type="text" value="{{$faq->question}}" name="question_{{$faq->language->label}}" id="question_{{$faq->language->label}}" class="form-control input-circle-right" placeholder="Your Question..."> </div>
                                                </div>
                                            </div>


                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$faq->language->name}} answer</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                        </span>
                                                        <textarea class="my-editor" value="{{$faq->answer}}" name="answer_{{$faq->language->label}}" id="answer_{{$faq->language->label}}" placeholder="Description">

                                                        </textarea>
                                                    </div>
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

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}