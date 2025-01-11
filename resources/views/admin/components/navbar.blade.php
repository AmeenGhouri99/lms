<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{-- <i class="flag-icon flag-icon-{{ session('locale') == 'en' ? 'us' : 'sa' }}"></i>
                        <span class="selected-language">{{ session('locale') == 'en' ? 'English' : 'عربي' }}</span> --}}
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ auth()->user()->role_id === 1 }}"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon"
                            data-feather="message-square"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">


                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name fw-bolder">{{ auth()->check() ? auth()->user()->name : null }}</span><span
                                class="user-status">{{ auth()->check() && auth()->user()->role_id === 1 ? 'Admin' : 'User' }}</span>
                        </div><span class="avatar"><img class="round" src="{{ asset('app-assets/images/uni.png') }}"
                                alt="Avatar" height="40" width="40"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a
                            class="dropdown-item" href="#"><i class="me-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="me-50"
                                data-feather="power"></i> logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
