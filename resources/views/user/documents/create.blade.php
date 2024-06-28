@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Documents to be attached</h3>
                    <ul style="color: red">
                        <li>Please upload the all required images below.</li>
                        <li>Any Image more than 150KB will not be uploaded reduce. <a
                                href="https://www.resizepixel.com/reduce-image-in-kb/">Click</a> to reduce the image size
                        </li>

                        {{-- <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li> --}}
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            @include('flash::message')
                            {!! html()->form('POST', route('user.documents.store'))->attribute('enctype', 'multipart/form-data')->open() !!}
                            @include('user.documents.fields')
                            {{ html()->form()->close() }}
                            @include('user.documents.table')

                        </div>
                    </div>
                </div>
            </div>
            <!--/ Academic Card -->
    </div>
    </section>

    </div>
    <!-- END: Content-->
@endsection
