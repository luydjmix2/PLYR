<!-- Sidebar -->
<!--
    Sidebar Mini Mode - Display Helper classes
    Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element
    Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
    Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
    Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="tracking-wider smini-hide font-size-h5">
                PL&R
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="ml-1 d-lg-none btn btn-sm btn-dual" data-toggle="layout" data-action="sidebar_close"
               href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
{{--                <li class="nav-main-item {{ Helper::setActiveRoute('dashboard') }}">--}}
{{--                    --}}{{-- <a class="nav-main-link {{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">--}}
{{--                        <i class="nav-main-link-icon si si-cursor"></i>--}}
{{--                        <span class="nav-main-link-name">Dashboard</span>--}}
{{--                    </a> --}}
{{--                    <a class="nav-main-link {{ Helper::setActiveRoute('dashboard') }}" href="{{ route('dashboard') }}">--}}
{{--                        <i class="nav-main-link-icon si si-cursor"></i>--}}
{{--                        <span class="nav-main-link-name">Dashboard</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-main-item {{ Helper::setOpenRoute('documents', 'users', 'proyects', 'groups') }}">--}}
{{--                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"--}}
{{--                       aria-expanded="true" href="#">--}}
{{--                        <i class="nav-main-link-icon fa fa-gem"></i>--}}
{{--                        <span class="nav-main-link-name">My Service</span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-main-submenu">--}}
{{--                        <li class="nav-main-item">--}}
{{--                            <a class="nav-main-link" href="{{ route('groups') }}">--}}
{{--                                <span class="nav-main-link-name">{{ __('proyects.name')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->
