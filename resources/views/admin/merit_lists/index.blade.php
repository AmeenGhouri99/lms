@extends('admin.layouts.main')
@section('title', 'Merit Lists')
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
                                <h2 class="content-header-title float-start mb-0">Merit Lists</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Merit List</a></li>
                                        <li class="breadcrumb-item active">
                                            Merit Lists
                                        </li>
                                    </ol>
                                </div>
                            </div>
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
                                    Merit Lists
                                </h4>
                            </div>
                            @include('flash::message')
                            {{ html()->form('post', route('admin.merit-list.generate'))->attribute('enctype', 'multipart/form-data')->open() }}
                            @include('admin.merit_lists.field')
                            {{ html()->form()->close() }}
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
