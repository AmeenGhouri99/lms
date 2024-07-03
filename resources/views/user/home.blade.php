@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Home</h3>
                    <ul style="color: red">
                        <li>Below is the admission details</li>
                        <li>Admission Status are given below</li>
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            @include('flash::message')
                            @include('user.home_page_modal')
                            <h4>Applied In Following Programs</h4>
                            <table class="table" style="overflow:scroll">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Applied Programs</th>
                                        <th>Status</th>
                                        <th>Admission Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user->admission->isEmpty())
                                        <tr class="text-center">
                                            <td colspan="8">You have Not Applied in any Program</td>
                                        </tr>
                                    @else
                                        @foreach ($user->admission as $applied_program)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @foreach ($applied_program->program as $program)
                                                        {{ $program->appliedDegreeLevel->name }}{{ $program->program->name }}
                                                        |<br>
                                                    @endforeach
                                                </td>
                                                <td>{{ $applied_program->status }}</td>
                                                <td>{{ $applied_program->admission_date }}</td>
                                                <td>
                                                    <div class="row">
                                                        @if ($applied_program->is_undertaking_accept === 1)
                                                            <div class="col-3">
                                                                <span class="badge bg-success">Applied</span>
                                                            </div>
                                                        @elseif ($applied_program->admissionFee != null && $applied_program->admissionFee->count() > 0)
                                                            <div class="col-3"><a
                                                                    href="{{ route('user.review-application', $applied_program->id) }}"
                                                                    class="btn btn-warning btn-sm">Review&Submit</a>
                                                            </div>
                                                        @else
                                                            <div class="col-3"><a
                                                                    href="{{ route('user.pay-admission-fee.show', $applied_program->id) }}"
                                                                    class="btn btn-primary btn-sm">PayFee</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
@push('js_scripts')
    <script>
        $(document).ready(function() {
            $('#shareProject').modal('show');
        });
    </script>
@endpush
