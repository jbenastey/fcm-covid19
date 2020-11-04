<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
    <div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
            <div
                class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center"
                data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
            <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen"
                                                               id="navbar-fullscreen" href="javascript:;"><i
                            class="ft-maximize font-medium-3"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="dropdown nav-item mr-1"><a
                            class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2"
                            href="javascript:;" data-toggle="dropdown">
                            <div class="user d-md-flex d-none mr-2"><span class="text-right">{{ Auth::user()->name }}</span><span
                                    class="text-right text-muted font-small-3">Available</span></div>
                            <img class="avatar" src="{{asset('apex/app-assets/img/portrait/small/avatar-s-1.png')}}"
                                 alt="avatar" height="35" width="35"></a>
                        <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0"
                             aria-labelledby="dropdownBasic2">

                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>Edit Profile</span></div></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar (Header) Ends-->
