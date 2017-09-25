@extends('admin.layout')

@section('title', 'General setting')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','General Setting')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','General setting')

@section('page_description','Add Services that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add General setting </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-8  col-md-offset-2">
                            {{Form::open(['route' => ['admin.general.setting.update' ,$general->id] , 'method' => 'put']) }}
                            <div class="tab-content">

                                <div class="portlet-body form">

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Website url</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="site_url" value="{{ $general->site_url }}" id="site_url" class="form-control input-circle-right" placeholder="website url"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>email</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="email" name="email" value="{{ $general->email }}" id="email" class="form-control input-circle-right" placeholder="Email"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="phone" value="{{ $general->phone }}" id="phone" class="form-control input-circle-right" placeholder="Phone"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Arabic address</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="address_ar" value="{{ $general->address_ar }}" id="phone" class="form-control input-circle-right" placeholder="Arabic Address"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>English Address</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="address_en" value="{{ $general->address_en }}" id="phone" class="form-control input-circle-right" placeholder="English Address"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Website Description</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-tasks  font-green"></i>
                                                <textarea name="site_description" id="site_description" cols="30" rows="10" placeholder="وصف الموقع" class="form-control {{ $errors->has('site_description') ? ' has-error' : '' }}"> {{ $general->site_description }} </textarea>
                                            </div>
                                            @if ($errors->has('site_description'))
                                                <span class="help-block">
                                                            <strong>{{ $errors->first('site_description') }}</strong>
                                                          </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Website Keywords</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-tasks   font-green"></i>
                                                <textarea name="site_keywords" id="site_keywords" cols="30" rows="10" placeholder="Website Keywords" class="form-control">{{ $general->site_keywords }}</textarea>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Google analytics Id</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="google_analytics_id" value="{{ $general->google_analytics_id }}" id="phone" class="form-control input-circle-right" placeholder="Google analytics id"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Google analytics script</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-code  font-green"></i>
                                                <textarea name="google_analytics_script" id="google_analytics_script" cols="30" rows="10" placeholder="Google analytics script" class="form-control"> {{ $general->google_analytics_script }} </textarea>
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