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
                        <h3 class="font-28">{{trans('front.medical_equipments')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('medical_equipments.index')}}">{{trans('front.medical_equipments')}}</a></li>
                            <li class="active text-theme-colored">{{trans('front.medical_equipments')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row multi-row-clearfix">
                <div class="blog-posts">
                    @foreach($equipments as $equipment)
                        @foreach($equipment->description as $description)
                            @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
                                 <div class="col-sm-6 col-md-4">
                        <article class="post clearfix mb-30 bg-lighter">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="{{asset('uploads/medical_equipments/540x370/'.$equipment->image_url)}}" alt="" class="img-responsive img-fullwidth">
                                </div>
                            </div>
                            <div class="entry-content p-20 pr-10">
                                <div class="entry-meta media mt-0 no-bg no-border">

                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">{{$description->title}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-10">{!! strip_tags(str_limit(html_entity_decode($description->description,100))) !!}</p>
                                <a href="{{route('medical-equipment.details',$description->slug)}}" class="btn-read-more">Read more</a>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                            @endif
                        @endforeach
                    @endforeach
                    <div class="col-md-12">
                        <div class="col-md-12">

                            <div class="text-center">
                                {!! $equipments->links() !!}
                            </div>
                            <div class="text-center">
                                <strong>Page : {{ $equipments->currentPage() }} of {{ $equipments->lastPage() }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


