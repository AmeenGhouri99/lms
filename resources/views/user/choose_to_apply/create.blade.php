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
                        <li>Choosing Program depends on your Intermediate Degree suppose you have degree of Simple FA then
                            you can apply only on BBA/IT </li>
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
                            @include('flash::message')
                            {{ html()->form('POST', route('user.choose-program-to-apply.store'))->open() }}
                            @include('user.choose_to_apply.fields')
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
