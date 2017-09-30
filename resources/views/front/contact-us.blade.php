@extends('front.layout')

@section('title','الرئيسية')




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">About us</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li class="active text-theme-colored">Page Title</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
        <div class="container pt-0">
            <div class="row mb-60 bg-deep">
                <div class="col-sm-12 col-md-4">
                    <div class="contact-info text-center pt-60 pb-60 border-right">
                        <i class="fa fa-phone font-36 mb-10 text-theme-colored"></i>
                        <h4>Call Us</h4>
                        <h6 class="text-gray">Phone: +262 695 2601</h6>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="contact-info text-center  pt-60 pb-60 border-right">
                        <i class="fa fa-map-marker font-36 mb-10 text-theme-colored"></i>
                        <h4>Address</h4>
                        <h6 class="text-gray">121 King Street, Australia</h6>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="contact-info text-center  pt-60 pb-60">
                        <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
                        <h4>Email</h4>
                        <h6 class="text-gray">you@yourdomain.com</h6>
                    </div>
                </div>
            </div>
            <div class="row pt-10">
                <div class="col-md-5">
                    <h4 class="mt-0 mb-30 line-bottom">Find Our Location</h4>
                    <!-- Google Map HTML Codes -->
                    <div
                            data-address="121 King Street, Melbourne Victoria 3000 Australia"
                            data-popupstring-id="#popupstring1"
                            class="map-canvas autoload-map"
                            data-mapstyle="style8"
                            data-height="420"
                            data-latlng="-37.817314,144.955431"
                            data-title="sample title"
                            data-zoom="12"
                            data-marker="{{asset('front/images/map-marker.png')}}">
                    </div>
                    <div class="map-popupstring hidden" id="popupstring1">
                        <div class="text-center">
                            <h3>CharityFund Office</h3>
                            <p>121 King Street, Melbourne Victoria 3000 Australia</p>
                        </div>
                    </div>
                    <!-- Google Map Javascript Codes -->
                    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAYWE4mHmR9GyPsHSOVZrSCOOljk8DU9B4"></script>
                    <script src="{{asset('front/js/google-map-init.js')}}"></script>
                </div>
                <div class="col-md-7">
                    <h4 class="mt-0 mt-sm-30 mb-30 line-bottom">Interested in discussing?</h4>
                    <!-- Contact Form -->
                    <form class="" action="{{route('contact.post')}}" method="post">
    {!! csrf_field() !!}

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Name <small>*</small></label>
            <input name="name" class="form-control" type="text" placeholder="Enter Name" required="">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Email <small>*</small></label>
            <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Subject <small>*</small></label>
            <input name="subject" class="form-control required" type="text" placeholder="Enter Subject">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Phone</label>
            <input name="phone" class="form-control" type="text" placeholder="Enter Phone">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Message</label>
    <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
</div>
<div class="form-group">
    <input name="form_botcheck" class="form-control" type="hidden" value="" />
    <button type="submit" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Send your message</button>
    <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
</div>
</form>

<!-- Contact Form Validation-->
<script type="text/javascript">
$("#contact_form").validate({
    submitHandler: function(form) {
        var form_btn = $(form).find('button[type="submit"]');
        var form_result_div = '#form-result';
        $(form_result_div).remove();
        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
        var form_btn_old_msg = form_btn.html();
        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
        $(form).ajaxSubmit({
            dataType:  'json',
            success: function(data) {
                if( data.status == 'true' ) {
                    $(form).find('.form-control').val('');
                }
                form_btn.prop('disabled', false).html(form_btn_old_msg);
                $(form_result_div).html(data.message).fadeIn('slow');
                setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
            }
        });
    }
});
</script>
</div>
</div>
</div>
</section>  </div>
<!-- end main-content -->


@endsection


@section('js')

<!-- JS | Custom script for all pages -->
<script src="{{asset('front/js/custom.js')}}"></script>
@endsection


