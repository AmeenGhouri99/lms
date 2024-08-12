@extends('admin.layouts.main')
@section('title', 'Create Program')
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
                                <h2 class="content-header-title float-start mb-0">Create Program</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        {{-- <li class="breadcrumb-item"><a href="#">{{ __('general.Dashboard')}}</a></li> --}}
                                        <li class="breadcrumb-item"><a href="#">Add Program</a></li>
                                        <li class="breadcrumb-item active">Add Program</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                        <div class="mb-1 breadcrumb-right">
                            <a class="dt-button create-new btn btn-primary" href="{{ route('admin.programs.index') }}"><i
                                    data-feather='arrow-left'></i></a>
                        </div>

                    </div>
                    <!-- Bread Crumb END-->

                    <div class="card p-1">
                        <!-- Add Category Form START -->
                        {!! Form::open(['route' => 'admin.banners.store', 'files' => true, 'class' => 'form']) !!}
                        <div class="row mb-2 mt-2">
                            @include('flash::message')
                            @include('admin.banners.fields')
                        </div>

                        {!! Form::close() !!}
                        <!-- Add Category Form END -->
                    </div>

                </div>
            </div>
        </div>
        <!-- END: Content-->
    @endsection

    @push('js_scripts')
        {{-- <script>
        const submissionButton = document.querySelector('.submission-button');
        const nextButton = document.querySelector('.next-button');

        submissionButton.addEventListener('click', () => {
            nextButton.style.display = 'block';
        });
    </script> --}}
    @endpush
