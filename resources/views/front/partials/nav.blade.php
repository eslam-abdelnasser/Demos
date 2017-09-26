<!-- Header -->
<header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget no-border m-0">
                        <ul class="styled-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="widget no-border m-0">
                        <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">123-456-789</a> </li>
                            <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Mon-Fri 8:00 to 2:00 </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">contact@yourdomain.com</a> </li>
                            {{--  <li class="sm-display-block mt-sm-10 mb-sm-10">
                                 <!-- Modal: Appointment Starts -->
                                 <a class="bg-light p-5 text-theme-colored font-11 ajaxload-popup" href="{{asset('front/ajax-load/form-appointment.html')}}">Make an Appointment</a>
                                 <!-- Modal: Appointment End -->
                             </li> --}}

                            <li class="sm-display-block mt-sm-10 mb-sm-10">
                                <!-- Modal: Appointment Starts -->
                                <a class="bg-light p-5 text-theme-colored font-11 ajaxload-popup" href="{{asset('front/ajax-load/form-appointment.html')}}">Appointment</a>
                                <!-- Modal: Appointment End -->
                            </li>

                            @if(LaravelLocalization::getCurrentLocale() == 'en')
                                <li class="sm-display-block mt-sm-10 mb-sm-10">
                                    <a  class="bg-light p-5 text-theme-colored font-11"  href="{{LaravelLocalization::getLocalizedURL('ar') }}">عربي</a>
                                </li>
                            @else
                                <li class="sm-display-block mt-sm-10 mb-sm-10"><a  class="bg-light p-5 text-theme-colored font-11" href="{{LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
                            @endif



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
            <div class="container">
                <nav id="menuzord-right" class="menuzord blue bg-lightest">
                    <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
                        <img src="{{asset('front/images/logo-wide.png')}}" alt="">
                    </a>
                    {{--<div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>--}}
                    <ul class="menuzord-menu">

                        <li class="  "><a href='{{ url("/" , LaravelLocalization::setLocale()) }}'>Home</a>

                        </li>

                        <li><a href='{{route("about-us")}}'>About us</a></li>
                        <li><a href='{{route('services')}}'>Services</a></li>
                        <li><a href='{{route('blog')}}'>Blog</a></li>

                        <li><a href='{{route('clinics')}}'>Clinics</a></li>

                        <li><a href='{{route('doctors')}}'>Team</a></li>

                        <li><a href='{{route('medical-equipment')}}'>Medical equipment</a></li>

                        <li><a href='{{route('media')}}'>Media</a></li>


                        <li><a href='{{route('careers')}}'>Careers</a></li>
                        <li><a href='{{route('contact-us')}}'>Contact us</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- end header -->