<table class="table table-bordered table-sm table-striped" style="text-align: center;">
    <thead>
        <tr>
            <th>#</th>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Reporting Teacher</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $key => $value)
            <tr>
                <td style="text-align: center;"> {{ $key + $students->firstItem()}}</td>
                <td style="text-align: center;">{{ $value->id }}</td>
                <td style="text-align: center;">{{ $value->name }}</td>
                <td style="text-align: center;">{{ $value->age }}</td>
                <td style="text-align: center;">{{ $value->gender }}</td>
                <td style="text-align: center;">@isset($value->teacher) {{ $value->teacher->name }} @endisset</td>
                <td style="text-align: center;">
                    {{-- <div class="btn-group btn-group-sm"> --}}
                    <a href="#" data-endpoint="{{ route('students.edit', $value->id) }}" data-async="true" data-toggle="tooltip"  data-id="{{ $value->id }}" data-original-title="Edit" class="edit btn btn-warning btn-sm" data-target="modal-default" data-cache="false" data-act_type="edit"><i class="fas fa-edit" ></i></a>&nbsp;
                    <a href="#" data-endpoint="{{ route('students.delete', $value->id) }}" data-async="true" data-toggle="tooltip"  data-id="{{ $value->id }}" data-original-title="Delete" class="edit btn btn-crm btn-sm" data-target="modal-default" data-cache="false" data-act_type="delete"><i class="fas fa-trash" ></i></a>&nbsp;
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
    {!! $students->links() !!}