@extends('front.layout')

@section('title',trans('front.doctors'))




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">{{trans('front.our_doctors')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('doctors')}}">{{trans('front.our_doctors')}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Our doctors--}}
    <!-- Section: Doctors -->
    <section id="doctors">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">{{trans('front.our_doctors')}}</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-4col">
                        @foreach($doctors as $doctor)
                            @foreach($doctor->description as $description)
                                @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
                                 <div class="item">
                            <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                <div class="team-thumb">
                                    <img class="img-fullwidth" alt="" src="{{asset('uploads/doctors/275x370/'.$doctor->image_url)}}">
                                    <div class="team-overlay"></div>
                                </div>
                                <div class="team-details bg-silver-light pt-10 pb-10">
                                    <h4 class="text-uppercase font-weight-600 m-5">Dr. {{$description->name}}</h4>
                                    <h6 class="text-theme-colored font-15 font-weight-400 mt-0">{{$description->job_title}}</h6>
                                </div>
                            </div>
                        </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Our doctors--}}


@endsection


