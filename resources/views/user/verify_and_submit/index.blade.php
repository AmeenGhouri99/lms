@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Review & Submit Application</h3>
                    <ul style="color: red">
                        {{-- <li>Entries with (*) is Compulsory</li> --}}
                        {{-- <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li> --}}
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            @include('flash::message')
                            {!! html()->form('POST', route('user.is-undertaking-accept.store'))->attribute('enctype', 'multipart/form-data')->open() !!}
                            {{-- @dd($admission_id) --}}
                            @include('user.verify_and_submit.review_application', [
                                'admission_id' => $admission_id,
                            ])
                            {{ html()->form()->close() }}
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
