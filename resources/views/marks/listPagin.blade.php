<table class="table table-bordered table-sm table-striped" style="text-align: center;">
    <thead>
        <tr>
            <th>#</th>
            <th>Id</th>
            <th>Name</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($marks as $key => $value)

            <tr>
                <td style="text-align: center;"> {{ $key + $marks->firstItem()}}</td>
                <td style="text-align: center;">{{ $value->id }}</td>
                <td style="text-align: center;">@isset($value->student) {{ $value->student->name }} @endisset</td>
                <td style="text-align: center;">{{ $value->maths_mark }}</td>
                <td style="text-align: center;">{{ $value->science_mark }}</td>
                <td style="text-align: center;">{{ $value->history_mark }}</td>
                <td style="text-align: center;">{{ $value->term }}</td>
                {{-- <td style="text-align: center;">@isset($value->total_mark) {{ $value->total_mark }} @endisset</td> --}}
                <td style="text-align: center;">{{ $value->maths_mark+$value->science_mark+$value->history_mark }}</td>
                <td style="text-align: center;">@isset($value->created_at) {{ $value->created_at->format('M d, Y H:i:a') }} @endisset</td>
                <td style="text-align: center;">
                    {{-- <div class="btn-group btn-group-sm"> --}}
                    <a href="#" data-endpoint="{{ route('marks.edit', $value->id) }}" data-async="true" data-toggle="tooltip"  data-id="{{ $value->id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm" data-target="modal-default" data-cache="false" data-act_type="edit"><i class="fas fa-edit" ></i></a>&nbsp;
                    <a href="#" data-endpoint="{{ route('marks.delete', $value->id) }}" data-async="true" data-toggle="tooltip"  data-id="{{ $value->id }}" data-original-title="Delete" class="edit btn btn-crm btn-sm" data-target="modal-default" data-cache="false" data-act_type="delete"><i class="fas fa-trash" ></i></a>&nbsp;
                </td>
            </tr>
        @empty
        <tr>
            <th scope="row" colspan="9">No Data To List . . . </th>
        </tr>
        @endforelse
    </tbody>
</table>

<br>
<br>
    {!! $marks->links() !!}