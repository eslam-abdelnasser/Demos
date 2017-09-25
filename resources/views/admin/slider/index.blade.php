@extends('admin.layout')

@section('title', 'Services')

{{-- start css --}}
@section('css')
	<style>
		.has-error{
			border: 2px solid red;
		}

		.help-block{
			color:red;
		}
	</style>

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Services')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Services')

@section('page_description','All your website Services')

{{-- end page title --}}


@section('content')


	<div class="row">
		<div class="col-md-12">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<button class="btn sbold green" onclick="javascript:location.href= '{{route('slider.create')}}' ">اضافه سلايدر جديد</button>
					</div>
				</div>
				<div class="portlet-body">

					<div class="mt-element-card mt-element-overlay">
						<div class="row">



							@if($sliders->count())

								@foreach($sliders as $slider)
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<div class="mt-card-item">
											<div class="mt-card-avatar mt-overlay-4">
												<img src='{{ asset("uploads/slider/$slider->slider_image") }}' />
												<div class="mt-overlay">
													<h2>slider operations</h2>

													<div class="mt-info font-white">
														<div class="mt-card-content">

															<div class="mt-card-social">
																<ul>



																	<li>
																		<button class="btn btn-warning" onclick="javascript:location.href= '{{route('slider.edit' , $slider->id )}}' ">
																			Edit
																		</button>
																	</li>
																	<li>
																		{!! Form::open(['route'=>['slider.destroy' , $slider->id] , 'method'=>'POST' , 'id'=>'delete_image']) !!}
																		{{ method_field('delete') }}
																		<button type="submit"  class="btn btn-danger" rel="nofollow">Delete</button>

																		{!! Form::close() !!}


																	</li>


																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								@endforeach
							@else

								<div class="note note-danger text-center">
									<h4>عفوا , لا يوجد اى سلايد شو حاليا للاضافه قم بالضغط على اضلافه سلايدر جديد</h4>
								</div>
							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END : USER CARDS -->

@endsection

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')


@endsection

{{-- end javascript --}}