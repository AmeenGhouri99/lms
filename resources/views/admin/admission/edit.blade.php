@extends('admin.layouts.main')
@section('main-section')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">

                <!-- Bread Crumb START-->
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-start mb-0">Edit Admission</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#">Admission</a></li>
                                        <li class="breadcrumb-item active">Edit Admission</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                        <div class="mb-1 breadcrumb-right">
                            <a class="dt-button create-new btn btn-primary" href="{{ route('admin.admissions.index') }}"><i
                                    data-feather='arrow-left'></i></a>
                        </div>
                    </div>
                </div>
                <!-- Bread Crumb END-->

                <div class="card p-2">

                    <!-- Add Product Form START -->
                    <!-- Add Image Section END -->
                    @include('flash::message')
                    @include('admin.admission.fields')
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- Script Code END -->
@endsection
