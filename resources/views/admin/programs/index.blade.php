@extends('admin.layouts.main')
@section('title', 'Users')
@section('main-section')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Bread Crumb START-->
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-start mb-0">Progams</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Programs</a></li>
                                        <li class="breadcrumb-item active">
                                            Progams
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                        <div class="mb-1 breadcrumb-right">
                            <a class="dt-button create-new btn btn-primary" href="{{ route('admin.programs.create') }}"><i
                                    data-feather='plus'></i></a>
                        </div>

                    </div>
                </div>
                <!-- Bread Crumb END-->
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Programs
                                </h4>
                            </div>
                            <div class="row mt-1">
                                <div class="col-3">
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.programs.index') }}?parent=parent_programs"> Parent
                                        Programs</a>
                                </div>
                            </div>
                            @include('flash::message')
                            @include('admin.users.table')
                        </div>
                    </div>
                </div>
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
