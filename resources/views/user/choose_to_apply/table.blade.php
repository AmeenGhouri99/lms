<h4 class="mt-1">Applied In Following Programs</h4>
<h6 class="text-danger">If you have applied in the Engineering Programs/Engineering Technology Programs with no ECAT,
    then you will attempt the University Entry Test Which will be take on
    <b>{{ settings('university_entry_test') }}</b> in the Univeristy
</h6>
<table class="table" style="overflow:scroll">
    <thead>
        <tr>
            <th>Sr#</th>
            <th>Applied Programs</th>
            @php
                $show_ecat_columns = false;
                foreach ($applied_programs as $applied_program) {
                    if ($applied_program->is_e_cat_attempt === 1) {
                        $show_ecat_columns = true;
                        break;
                    }
                }
            @endphp
            @if ($show_ecat_columns)
                <th>ECAT Roll No</th>
                <th>ECAT Obtained Marks</th>
                <th>ECAT Total Marks</th>
                <th>ECAT %age</th>
            @endif
            {{-- <th>Status</th> --}}
            <th>Admission Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($applied_programs->isEmpty())
            <tr class="text-center">
                <td colspan="8">No Admission Record Exists</td>
            </tr>
        @else
            @foreach ($applied_programs as $applied_program)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @foreach ($applied_program->program as $program)
                            {{ $program->appliedDegreeLevel->name }} {{ $program->program->name }} |<br>
                        @endforeach
                    </td>
                    @if ($show_ecat_columns)
                        @if ($applied_program->is_e_cat_attempt === 1)
                            <td>{{ $applied_program->e_cat_roll_no }}</td>
                            <td>{{ $applied_program->e_cat_obtained_marks }}</td>
                            <td>{{ $applied_program->e_cat_total_marks }}</td>
                            <td>{{ ($applied_program->e_cat_obtained_marks / $applied_program->e_cat_total_marks) * 100 }}%
                            </td>
                        @else
                            <td colspan="4">N/A</td>
                        @endif
                    @endif
                    {{-- <td>{{ $applied_program->status }}</td> --}}
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
                                        class="btn btn-warning btn-sm">Review&Submit</a></div>
                            @else
                                <div class="col-3"><a
                                        href="{{ route('user.pay-admission-fee.show', $applied_program->id) }}"
                                        class="btn btn-primary btn-sm">PayFee</a></div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
