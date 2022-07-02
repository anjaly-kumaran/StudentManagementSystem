@isset($student)
    <form class="form-horizontal" method="POST" action="{{ route('students.update', $student->id) }}" id="submitForm">{{-- 
    @method('PUT') --}}
@else
    <form class="form-horizontal" method="POST" action="{{ route('students.store') }}" id="submitForm">
@endisset
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="modelHeading">@isset($student) Update Student @else Add Student @endisset</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger" id="erralert"></div>
        <input type="hidden" name="student_id" id="student_id" @isset($student->id) value="{{ $student->id }}" @endisset>
        <div class="card-body">
            
            <div class="form-group row">
                <label for="student_from_date" class="col-sm-4 col-form-label">{{ __('Name :') }}</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter Student Name') }}" @isset($student->name) value="{{ $student->name }}" @endisset required="" >
                </div>
            </div>
            <div class="form-group row">
                <label for="student_from_date" class="col-sm-4 col-form-label">{{ __('Age :') }}</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="age" name="age" placeholder="{{ __('Enter Age') }}" @isset($student->age) value="{{ $student->age }}" @endisset required="" onkeypress="return isNumberKey(event);" max="99" maxlength="2">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-label col-sm-4">{{ __('Gender') }}</label>
                <div class="col-sm-8">
                    <input type="radio" value="Male" name="gender" required="" @isset($student->gender) @if($student->gender=='Male') checked="" @endif @endisset>&nbsp;Male
                    <input type="radio" value="Female" name="gender" required="" @isset($student->gender) @if($student->gender=='Female') checked="" @endif @endisset>&nbsp;Female
                    <input type="radio" value="Transgender" name="gender" required="" @isset($student->gender) @if($student->gender=='Transgender') checked="" @endif @endisset>&nbsp;Transgender
                </div>
            </div>     
            <div class="form-group row">
                <label class="form-label col-sm-4">{{ __('Reporting Teacher') }}</label>
            
                <div class="col-sm-8" >
                    <select name="reporting_teacher" id="reporting_teacher" class="form-control form-control-sm" >
                        <option value="">--Select--</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @isset($student->teacher_id) @if($teacher->id==$student->teacher_id) selected="" @endif @endisset>{{ $teacher->name }}</option>
                        @endforeach
                   </select>
                </div>
            </div>              
        </div>
        <!-- /.card-body -->     
    </div>
    <div class="modal-footer ">
        <button type="submit" class="btn btn-crm" id="saveBtn" @isset($student) value="edit-student" @else value="create-student" @endisset>Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>

<script type="text/javascript">
    $('#submitForm').submit(function(e){
        e.preventDefault();
        $('#erralert').hide();
        $('#erralert').html(" ");
        $('#saveBtn').prop('disabled',true);
        var form    = $(this);
        $.ajax({
            data : form.serialize(),
            url  : form.attr('action'),
            type : form.attr('method'),
        }).done(function(data) {
            //console.log(data);
            if (data.status == 'success') {
                $('#modal-default').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-crm",
                    allowOutsideClick: false
                }).then((result) => {
                    $('#saveBtn').prop('disabled',false);
                    location.reload();
                });
            }
            else if (data.status == 'error') {
                $('#saveBtn').prop('disabled',false);
                $('#erralert').show();
                $('#erralert').append('<ul></ul>');
                $('#erralert ul').append('<li>'+data.message+'</li>');
                $('#saveBtn').html('Save');
            
            }
        }).fail(function(data) {
            $('#saveBtn').prop('disabled',false);
            var err_resp = JSON.parse(data.responseText);
            $('#erralert').show();
            $('#erralert').append('<ul></ul>');
            $.each( err_resp.errors, function( key, value) {
                $('#erralert ul').append('<li>'+value+'</li>');
            });
        });
    });
</script>