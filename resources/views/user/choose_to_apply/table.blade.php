<table class="table mt-2" style="overflow:scroll">
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
                    <td> {{ $applied_program->degree_level_applied_id }}</td>
                    <td>{{ $applied_program->first_program_id }}</td>
                    <td>{{ $applied_program->second_program_id }}</td>
                    <td>{{ $applied_program->third_program_id }}</td>
                    <td>{{ $applied_program->fourth_program_id }}</td>
                    <td>{{ $applied_program->status }}</td>
                    <td>{{ $applied_program->admission_fee }}</td>

                    <td>{{ $applied_program->admission_date }}</td>


                    <td>
                        <div class="row">
                            <div class="col-3"><a
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
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
