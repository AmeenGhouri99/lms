<table class="table mt-2" style="overflow:scroll">
    <thead>
        <tr>
            <th>Sr#</th>
            <th>Document Type</th>
            <th>Document Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($documents->isEmpty())
            <tr class="text-center">
                <td colspan="8">No Record Exists</td>
            </tr>
        @else
            @foreach ($documents as $document)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $document->document_type }}</td>
                    <td><img src="{{ asset('storage/' . $document->document) }}" style="width: 75px" height="75px"></td>
                    <td>
                        <div class="row">
                            <div class="col-1"><a href="{{ route('user.documents.edit', $document->id) }}"><i
                                        data-feather='edit'></i></a></div>
                            <div class="col-1">
                                <form action="{{ route('user.documents.destroy', $document->id) }}" method="post"
                                    onclick="return confirm('Are you sure to delete?')">
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
