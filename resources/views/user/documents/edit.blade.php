@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Edit Uploaded Documents</h3>
                    <ul style="color: red">
                        <li>Entries with (*) is Compulsory</li>
                        {{-- <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li> --}}
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            @include('flash::message')
                            {{ html()->modelForm($document, 'PUT', route('user.documents.update', $document->id))->attribute('enctype', 'multipart/form-data')->open() }}
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
