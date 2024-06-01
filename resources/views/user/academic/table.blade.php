<table class="table mt-2" style="overflow:scroll">
    <thead>
        <tr>
            <th>Sr#</th>
            <th>Qualification</th>
            <th>University/Board</th>
            <th>Roll No</th>
            <th>Degree Exam Year</th>
            <th>Total Marks</th>
            <th>Obtained Marks</th>
            <th>Degree Image</th>
            <th>Percentage</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($academic_details->isEmpty())
            <tr class="text-center">
                <td colspan="8">No Qualification Record Exists</td>
            </tr>
        @else
            @foreach ($academic_details as $academic_detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $academic_detail->qualification }}</td>
                    <td>{{ $academic_detail->board_university_name }}</td>
                    <td>{{ $academic_detail->roll_no }}</td>
                    <td>{{ $academic_detail->degree_exam_year }}</td>
                    <td>{{ $academic_detail->total_marks }}</td>
                    <td>{{ $academic_detail->obtained_marks }}</td>
                    <td>{{ number_format(($academic_detail->total_marks / $academic_detail->obtained_marks) * 100) }} %
                    </td>
                    <td> <img src="{{ asset('storage/' . $academic_detail->image) }}" style="width: 65px; height:65px">
                    </td>

                    <td>
                        <div class="row">
                            <div class="col-3"><a
                                    href="{{ route('user.academic-information.edit', $academic_detail->id) }}"><i
                                        data-feather='edit'></i></a></div>
                            <div class="col-3">
                                <form action="{{ route('user.academic-information.destroy', $academic_detail->id) }}"
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
