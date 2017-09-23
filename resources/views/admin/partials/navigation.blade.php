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
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="index.html" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Dashboard 1</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="dashboard_2.html" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Dashboard 2</span>
                            <span class="badge badge-success">1</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="dashboard_3.html" class="nav-link ">
                            <i class="icon-graph"></i>
                            <span class="title">Dashboard 3</span>
                            <span class="badge badge-danger">5</span>
                        </a>
                    </li>
                </ul>
            </li>


            {{--<li class="heading">--}}
                {{--<h3 class="uppercase">Add languages</h3>--}}
            {{--</li>--}}
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Languages</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('languages.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Show Languages</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('languages.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Add new language</span>
                            <span class="selected"></span>
                        </a>
                    </li>



                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Admins</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Admin User</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('admins.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Admins</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('roles.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Roles</span>
                            <span class="selected"></span>
                        </a>
                    </li>


                    <li class="nav-item start">
                        <a href="{{route('permission.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Permissions</span>
                            <span class="selected"></span>
                        </a>
                    </li>



                </ul>
            </li>

            <li class="heading">
                <h3 class="uppercase">Pages</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Servicesr</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('services.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Services</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('services.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Create service</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">FAQ</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('faqs.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">FAQs</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('faqs.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Create New FAQ</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Blog</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('blogs.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Blogs</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('blogs.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Create New Blog</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Clinics</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Doctors</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('doctors.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Show Doctors</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('doctors.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Add doctor</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Clinics</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{route('clinics.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Clinics</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start">
                        <a href="{{route('clinics.create')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Create Clinic</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>







        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->