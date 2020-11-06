<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="{{asset('apex/app-assets/img/sidebar-bg/01.jpg')}}" data-scroll-to-active="true">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
        <div class="logo clearfix"><a class="logo-text float-left" href="{{route('dashboard')}}">
                <div class="logo-img"><img src="{{asset('apex/app-assets/img/logo.png')}}" alt="Apex Logo"/></div><span class="text">FCM</span></a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content main-menu-content">
        <div class="nav-container">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item @if(request()->is('dashboard')) open @endif"><a href="{{url('dashboard')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="Email">Dashboard</span></a>
                </li>
                <li class=" nav-item @if(request()->is('data')) open @endif"><a href="{{url('data')}}"><i class="ft-database"></i><span class="menu-title" data-i18n="Email">Data</span></a>
                </li>
{{--                <li class="has-sub nav-item @if(request()->is('master')) open @endif"><a href="javascript:;"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="Charts">Data Master</span></a>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li class="@if(request()->is('master/*')) active @endif"><a href="{{url('master')}}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Apex Charts">Data Kriteria</span></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class=" nav-item @if(request()->is('kuesioner')) open @endif"><a href="{{url('kuesioner')}}"><i class="ft-file-text"></i><span class="menu-title" data-i18n="Email">Kuesioner</span></a>--}}
{{--                </li>--}}
{{--                <li class=" nav-item @if(request()->is('ahp')) open @endif"><a href="{{url('ahp')}}"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Analisa AHP</span></a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
    <!-- / main menu-->
</div>
