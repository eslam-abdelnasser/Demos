<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
           
            <li class="nav-item start active">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.dashboard')}}</span>
                    <span class="selected"></span>

                </a>

            </li>


            {{--<li class="heading">--}}
                {{--<h3 class="uppercase">Add languages</h3>--}}
            {{--</li>--}}
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.languages')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    @if(Auth::guard('admin')->user()->can('languages.index'))
                    <li class="nav-item start">
                        <a href="{{route('languages.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.show_all_languages')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::guard('admin')->user()->can('languages.create'))
                    <li class="nav-item start">
                        <a href="{{route('languages.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.add_new_language')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.admins')}}</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.admin_user')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('admins.index'))
                    <li class="nav-item start">
                        <a href="{{route('admins.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.admins')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('roles.index'))
                    <li class="nav-item start">
                        <a href="{{route('roles.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.roles')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                        @endif

                    @if(Auth::guard('admin')->user()->can('permissions.index'))
                    <li class="nav-item start">
                        <a href="{{route('permission.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.permission')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.pages')}}</h3>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.slider_show')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    @if(Auth::guard('admin')->user()->can('slider.index'))
                    <li class="nav-item start">
                        <a href="{{route('slider.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.slider_show')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::guard('admin')->user()->can('slider.create'))
                    <li class="nav-item start">
                        <a href="{{route('slider.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.slider_create')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @if(Auth::guard('admin')->user()->can('admin.about.index'))
            <li class="nav-item start">
                <a href="{{route('admin.about.index')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">{{trans('admin/partials/navigation.about_us')}}</span>
                </a>
            </li>
            @endif

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.services')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('services.index'))
                    <li class="nav-item start">
                        <a href="{{route('services.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.services')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('services.create'))
                    <li class="nav-item start">
                        <a href="{{route('services.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.create_new_service')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.faqs')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('faqs.index'))
                        <li class="nav-item start">
                            <a href="{{route('faqs.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.faqs')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::guard('admin')->user()->can('faqs.create'))
                        <li class="nav-item start">
                            <a href="{{route('faqs.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_faq')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.blogs')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('blogs.index'))
                      <li class="nav-item start">
                        <a href="{{route('blogs.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.blogs')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('blogs.create'))
                    <li class="nav-item start">
                        <a href="{{route('blogs.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.create_new_blog')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.careers')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('careers.index'))
                      <li class="nav-item start">
                        <a href="{{route('careers.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.careers')}}</span>
                            <span class="selected"></span>
                        </a>
                </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('careers.create'))
                        <li class="nav-item start">
                            <a href="{{route('careers.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_career')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>



            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.galleries')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('galleries.index'))
                    <li class="nav-item start">
                        <a href="{{route('galleries.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.galleries')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                        @if(Auth::guard('admin')->user()->can('galleries.create'))

                    <li class="nav-item start">
                        <a href="{{route('galleries.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.create_new_gallery')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                            @endif
                </ul>
            </li>



            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.clinics')}}</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.doctors')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('doctors.index'))

                    <li class="nav-item start">
                        <a href="{{route('doctors.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.doctors')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                        @if(Auth::guard('admin')->user()->can('doctors.create'))

                    <li class="nav-item start">
                        <a href="{{route('doctors.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.create_new_doctor')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>



            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.clinic')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('clinics.index'))
                    <li class="nav-item start">
                        <a href="{{route('clinics.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.clinic')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                        @if(Auth::guard('admin')->user()->can('clinics.create'))

                    <li class="nav-item start">
                        <a href="{{route('clinics.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.create_new_clinic')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                            @endif
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.medical_equipments')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('medical_equipments.index'))

                    <li class="nav-item start">
                        <a href="{{route('medical_equipments.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.medical_equipments')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif

                        @if(Auth::guard('admin')->user()->can('medical_equipments.create'))
                        <li class="nav-item start">
                        <a href="{{route('medical_equipments.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.create_new_medical_equipment')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                            @endif
                </ul>
            </li>


            {{--@if(Auth::guard('admin')->user()->can('appointments.index'))--}}
            <li class="nav-item start">
                <a href="{{route('appointments.index')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title"> {{trans('admin/appointment.appointments')}}</span>
                </a>
            </li>
            {{--@endif--}}


            {{--@if(Auth::guard('admin')->user()->can('contact-us.index'))--}}
            <li class="nav-item start">
                <a href="{{route('contact-us.index')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title"> {{trans('admin/appointment.contact-us')}}</span>
                </a>
            </li>
            {{--@endif--}}


            @if(Auth::guard('admin')->user()->can('admin.general.setting'))
            <li class="nav-item start">
                <a href="{{route('admin.general.setting')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title"> {{trans('admin/partials/navigation.website_general_settings')}}</span>
                </a>
            </li>
                @endif
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->