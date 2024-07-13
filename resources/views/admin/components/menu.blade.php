<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mx-auto ">
                <a class="navbar-brand d-flex flex-column justify-content-center" href="#">
                    <img src="{{ asset('app-assets/images/uni.png') }}" alt="MNS-UET LOGO" class="rounded-circle "
                        style="width: 130px; height: 130px;">
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content mt-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!--DashBoard Menu START-->
            <li class=" nav-item {{ Route::CurrentRouteNamed('admin.dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Dashboard</span></a>
            </li>
            <li class="nav-item {{ Route::CurrentRouteNamed('admin.users*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.users.index') }}">
                    <i data-feather="users"></i><span class="menu-item text-truncate" data-i18n="Users">Users</span></a>
            </li>
            <li class="nav-item {{ Route::CurrentRouteNamed('admin.admissions*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.admissions.index') }}">
                    <i data-feather="anchor"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Admission
                    </span></a>
            </li>
            <li class="nav-item {{ Route::CurrentRouteNamed('admin.programs*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.programs.index') }}">
                    <i data-feather="box"></i><span class="menu-item text-truncate"
                        data-i18n="eCommerce">Programs</span></a>
            </li>
            <li class="nav-item {{ Route::CurrentRouteNamed('admin.settings*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.settings.create') }}">
                    <i data-feather="settings"></i><span class="menu-item text-truncate"
                        data-i18n="eCommerce">Settings</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
