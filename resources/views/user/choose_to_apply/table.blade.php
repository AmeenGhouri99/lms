<h4>Applied In Following Programs</h4>
<table class="table" style="overflow:scroll">
    <thead>
        <tr>
            <th>Sr#</th>
            <th>Applied Degree level</th>
            <th>First Program</th>
            <th>Second Program</th>
            <th>Third Program</th>
            <th>Fourth Program</th>
            <th>Status</th>
            <th>Admission Fee</th>
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
                    <td> {{ $applied_program->degreeLevelApplied->name }}</td>
                    <td>{{ $applied_program->firstProgram->name }}</td>
                    <td>{{ $applied_program->secondProgram->name ?? 'Not Choosed' }}</td>
                    <td>{{ $applied_program->thirdProgram->name ?? 'Not Choosed' }}</td>
                    <td>{{ $applied_program->fourthProgram->name ?? 'Not Choosed' }}</td>
                    <td>{{ $applied_program->status }}</td>
                    <td>{{ $applied_program->admission_fee }}</td>

                    <td>{{ $applied_program->admission_date }}</td>


                    <td>
                        <div class="row">
                            <div class="col-3"><a href="{{ route('user.pay-admission-fee.show', $applied_program->id) }}"
                                    class="btn btn-primary btn-sm">PayFee</a>
                            </div>
                            <div class="col-3"><a
                                    href="{{ route('user.choose-program-to-apply.edit', $applied_program->id) }}"><i
                                        data-feather='edit'></i></a></div>
                            <div class="col-3">
                                <form
                                    action="{{ route('user.choose-program-to-apply.destroy', $applied_program->id) }}"
                                    method="post" onclick="return confirm('Are you sure to delete?')">
                                    @csrf
                                    @method('delete')
                                    <button
                                        style="border-radius: none; padding:none;border:none;color:none;background:none"><i
                                            data-feather='delete' class="text-danger"></i></button>
                                </form>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
