@extends('front.layout')

@section('title','الرئيسية')


@if(LaravelLocalization::getCurrentLocale() == 'ar')
    @php
        $direction = '-rtl';
    @endphp
@else
    @php
        $direction = '';
    @endphp

@endif

@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/cubeportfolio/css/cubeportfolio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/css/portfolio'.$direction.'.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">Gallery</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li class="active text-theme-colored">Page Title</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- gallery --}}
    <div class="container">
        <div class="section-content">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">Gallery</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-content portfolio-1">
                    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> All
                            <div class="cbp-filter-counter"></div>
                        </div>
                        <div data-filter=".images" class="cbp-filter-item btn dark btn-outline uppercase"> Images
                            <div class="cbp-filter-counter"></div>
                        </div>
                        <div data-filter=".video" class="cbp-filter-item btn dark btn-outline uppercase"> youtube videos
                            <div class="cbp-filter-counter"></div>
                        </div>

                    </div>
                    <div id="js-grid-juicy-projects" class="cbp">

                        <div class="cbp-item images">
                            <div class="cbp-caption">
                                <div class="cbp-caption-defaultWrap">

                                    <img src="{{asset('uploads/galleries/admin/1.png')}}" alt="">

                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <a href="https://www.youtube.com/watch?v=55BnfXKgbN4" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>



            </div></div></div>
    {{-- gallery --}}

<br>
@endsection


@section('js')
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/scripts/portfolio-1.min.js')}}" type="text/javascript"></script>
@endsection