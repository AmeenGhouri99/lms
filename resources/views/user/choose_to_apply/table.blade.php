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
                            {{ $program->appliedDegreeLevel->name }}{{ $program->program->name }} |<br>
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
                                <div class="col-3"><a href="{{ route('user.review-application', $applied_program->id) }}"
                                        class="btn btn-warning btn-sm">Review&Submit</a>
                                </div>
                            @else
                                <div class="col-3"><a
                                        href="{{ route('user.pay-admission-fee.show', $applied_program->id) }}"
                                        class="btn btn-primary btn-sm">PayFee</a>
                                </div>
                            @endif


                            {{-- <div class="col-3"><a
                                    href="{{ route('user.choose-program-to-apply.edit', $applied_program->id) }}"><i
                                        data-feather='edit'></i></a></div>
                            <div class="col-3">
                                <form action="{{ route('user.choose-program-to-apply.destroy', $applied_program->id) }}"
                                    method="post" onclick="return confirm('Are you sure to delete?')">
                                    @csrf
                                    @method('delete')
                                    <button
                                        style="border-radius: none; padding:none;border:none;color:none;background:none"><i
                                            data-feather='delete' class="text-danger"></i></button>
                                </form>
                            </div> --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
