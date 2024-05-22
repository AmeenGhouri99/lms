@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Academic Information</h3>
                    <ul style="color: red">
                        <li>Enter Your Qualification Starting From Matriculation</li>
                        <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li>
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            @include('flash::message')
                            {{ html()->form('post', route('user.academic-information.store'))->open() }}
                            @include('user.academic.fields')
                            {{ html()->form()->close() }}

                            @include('user.academic.table')
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
