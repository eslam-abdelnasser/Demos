<!-- Footer -->
<footer id="footer" class="footer pb-0" data-bg-img="images/footer-bg.png" data-bg-color="#25272e">
    <div class="container pt-90 pb-60">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark"> <img alt="" src="{{asset('front/images/logo-wide-white.png')}}">
                    @foreach($about_us->description as $description )
                        @if(LaravelLocalization::getCurrentLocale() == $description->language->label )
                    <p class="font-12 mt-10 mb-10">{!!  str_limit(strip_tags(html_entity_decode($description->description)),100) !!}</p>
                        @endif
                    @endforeach
                    <a class="btn btn-default btn-transparent btn-xs btn-flat mt-5" href="{{route('about-us')}}">Read more</a>
                    <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm mt-20">
                        @foreach($socials as $social)
                            <li><a href="{{$social->url}}"><i class="fa fa-{{$social->icon}}"></i></a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">Latest blog</h5>
                    <div class="latest-posts">
                        @foreach($blog as $singleBlog)
                            @foreach($singleBlog->description  as $description)
                                @if(LaravelLocalization::getCurrentLocale() == $description->language->label )
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a class="post-thumb" href="{{route('blog.details',$singleBlog->id)}}"><img src="{{asset('uploads/blogs/80x55/'.$singleBlog->image_url)}}" alt=""></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="{{route('blog.details',$singleBlog->id)}}">{{$description->title}}</a></h5>
                                <p class="post-date mb-0 font-12">{{date("F j, Y",strtotime($singleBlog->created_at))}}</p>
                            </div>
                        </article>
                                @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">{{trans('front.contact-us')}}</h5>
                    <form  class="quick-contact-form" action="{{route('contact-us-footer')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input name="email" class="form-control" type="text" required="" placeholder="{{trans('front.mail')}}">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" required="" placeholder="{{trans('front.message')}}" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-default btn-transparent btn-xs btn-flat mt-0" data-loading-text="Please wait...">{{trans('front.send_message')}}</button>
                        </div>
                    </form>

                    <!-- Quick Contact Form Validation-->
                    <script type="text/javascript">
                        $("#footer_quick_contact_form").validate({
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
            {!! trans('front.text') !!}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="horizontal-contact-widget mt-30 pt-30 text-center">
                    <div class="col-sm-12 col-sm-4">
                        <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10"></i>
                            <h5 class="text-white">{{trans('front.contact-us')}}</h5>
                            <p>Phone: <a href="#">{{$setting->phone}}</a></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-sm-4 mt-sm-50">
                        <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                            <h5 class="text-white">{{trans('front.address')}}</h5>
                            @if(LaravelLocalization::getCurrentLocale() == 'ar' )
                            <p>{{$setting->address_ar}}</p>
                            @else
                                <p>{{$setting->address_en}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-sm-4 mt-sm-50">
                        <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                            <h5 class="text-white">{{trans('front.mail')}}</h5>
                            <p><a href="#">{{$setting->email}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline styled-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-30 mb-10">

                    @foreach($socials as $social)
                    <li><a href="{{$social->url}}"><i class="fa fa-{{$social->icon}}"></i></a> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-theme-colored p-20">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="text-white font-11 m-0">Copyright &copy;2016 Startpointit. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->



{{-- start modal appointment --}}
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Make appointment</h3>
            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <!-- Booking Form Starts -->
                <p class="lead">Fill fields.</p>
                <!-- Appointment Form -->
                {{--<form id="popup_appointment_form" name="popup_appointment_form" class="" method="post" action="{{route('admin.login')}}">--}}
                    {!! Form::open(['route'=>'appointment.post' , 'method'=>'post','id'=>'make_appointment']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="phone" class="form-control" type="text" placeholder="Enter Mobile number" aria-required="true">
                            </div>
                        </div>
                        {{--<div class="col-sm-12">--}}
                            {{--<div class="form-group mb-10">--}}
                                {{--<input name="form_appontment_date" class="form-control required datetime-picker" type="text" placeholder="Appoinment Date & Time" aria-required="true">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Clinic:</strong></label>
                                <select name="clinic" class="form-control" id="clinic" required>
                                    <option value="">-- select one --</option>
                                    @foreach($clinics as $clinic)
                                        @foreach($clinic->description as $description)
                                        @if(LaravelLocalization::getCurrentLocale() == $description->language->label )
                                    <option value="{{$clinic->id}}">{{$description->title}}</option>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Doctor:</strong></label>
                                <select name="doctor" class="form-control" id="doctor_selection" required>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-10">
                        <textarea id="form_message" name="message" class="form-control required"  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                    </div>
                    <div class="form-group mb-0 mt-20">
                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                        <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                    </div>
                    <div class="btn-group btn-delete hidden" role="group">
                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- start modal appointment --}}



<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
{{--<script src="js/custom.js"></script>--}}
{{ Html::script('front/js/custom.js')}}
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">


$(function () {

    $("#clinic").change(function() {
        $("#doctor_selection").html('');
        var  data = "{{json_encode($clinics_doctors)}}";

        var doctor_clinic = JSON.parse(data.replace(/&quot;/g,'"')) ;
        var  clinic = $(this).val();
        $.each(doctor_clinic, function (key, data) {
            $.each(data, function (index, data) {
                if(key == clinic){
                $("#doctor_selection").append('<option value="'+data.doctor_id+'">'+data.name +"</option>");
                }
            })
        })


    });




    $('#make_appointment').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {

                swal("Good job!", "You clicked the button!", "success");
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });

});
</script>
@yield('js')
</body>
</html>