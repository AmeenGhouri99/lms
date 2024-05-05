@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Choose to apply</h3>
                    <ul style="color: red">
                        <li>Entries with (*) is Compulsory.</li>
                        <li>Click "Select Quota" button to apply in the program.</li>
                        <li>After you have selected the quota of the program please click on "Apply" button.</li>
                        <li>The list of the all programs will be displayed at the end of the page click "Print Chalan" to
                            print the chalan.</li>
                        <li>If you have applied for MNS UET Entry test "Roll No slip" will also be displayed after
                            submission of the admission form.</li>

                        {{-- <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li> --}}
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            {{ html()->form('PUT', '/post')->open() }}
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Program Eligible to Apply</label>
                                    {{-- {{ html()->text('candidate_name')->class('form-control form-control-sm') }} --}}
                                    <h4>Fsc Pre Aggriculture</h4>
                                </div>
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Quota/Category Applied</label>
                                    <div class="row">
                                        <div class="col-8">
                                            {{ html()->text('category_quota_applied')->class('form-control form-control-sm') }}
                                        </div>
                                        <div class="col-2">
                                            <input type="submit
                                    " value="Select"
                                                name="select_qouta" class="btn btn-primary btn-sm">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit
                                    " value="Applied"
                                                name="applied_to_quota" class="btn btn-success btn-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Action</label>

                                </div>
                                <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1 text-end">
                                    <input type="
                                    " value="Save & Go To Next"
                                        name="submit" class="btn btn-success btn-sm">
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
