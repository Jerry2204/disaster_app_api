<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu text-white" id="mobile-collapse" href="#">
                <i class="ti-menu"></i>
            </a>
            <a href="index.html" class="d-flex align-items-center justify-content-center">
                <img class="img-fluid" style="height: 40px" src="{{ asset('login_style/images/section-mandiricoal-logo-2.png') }}" alt="Theme-Logo" />
                    SCM Dashboard MIP
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>

                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <a href="#" class="d-flex align-items-center">
                        <div class="d-flex justify-content-center align-items-center word-image-navbar text-white bg-c-blue mr-3">
                            Jerry
                        </div>
                        <span>Jerry</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="logout">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
