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
                            {{ html()->form('PUT', '/post')->open() }}
                            <div class="row">
                                <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Select Your Qualification:</label>
                                    {{ html()->select('qualification', ['' => 'Select', 'matriculation' => 'Matriculation', 'marticulation_with_science' => 'Matriculation With Science', 'ordinary_level' => 'Ordinary Level'])->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Select University/Board:</label>
                                    {{ html()->select('board_university', ['' => 'Select', 'dg_khan_board' => 'Dg Khan Board', 'multan_board' => 'Multan Board', 'sargodha_board' => 'Sargodha Board'])->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Enter Roll No:</label>
                                    {{ html()->text('roll_no')->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Enter Degree Exam Year:</label>
                                    {{ html()->text('degree_exam_year')->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Enter Total Marks:</label>
                                    {{ html()->text('total_marks')->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Enter Obtained Marks:</label>
                                    {{ html()->text('obtained_marks')->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0 mt-1">
                                    <input type="
                                    " value="Save Qualification"
                                        name="submit" class="btn btn-success">
                                </div>
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
