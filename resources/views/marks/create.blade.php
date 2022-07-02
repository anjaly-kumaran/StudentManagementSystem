{{-- @extends('layouts.master')
@extends('layouts.sidemenu')

@section('title') Add Marks @endsection

@section('content') --}}
	@isset($mark)
	    <form class="form-horizontal" method="POST" action="{{ route('marks.update', $mark->id) }}" id="submitForm">{{-- 
	    @method('PUT') --}}
	@else
	    <form class="form-horizontal" method="POST" action="{{ route('marks.store') }}" id="submitForm">
	@endisset
	    @csrf
	    <div class="modal-header">
	        <h4 class="modal-title" id="modelHeading">@isset($mark) Update Mark @else Add Mark @endisset</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
	    </div>
	    <div class="modal-body">
	        <div class="alert alert-danger" id="erralert"></div>
	        <input type="hidden" name="mark_id" id="mark_id" @isset($mark->id) value="{{ $mark->id }}" @endisset>
	        <div class="card-body">
	            
	            <div class="form-group row">
	                <label class="form-label col-sm-4">{{ __('Student') }}</label>
	            
	                <div class="col-sm-8" >
	                    <select name="student" id="student" class="form-control form-control-sm" >
	                        <option value="">--Select--</option>
	                        @foreach($students as $student)
	                            <option value="{{ $student->id }}" @isset($student->student_id) @if($student->id==$mark->student_id) selected="" @endif @endisset>{{ $student->name }}</option>
	                        @endforeach
	                   </select>
	                </div>
	            </div> 
	            <div class="form-group row">
	                <label class="form-label col-sm-4">{{ __('Term') }}</label>
	            
	                <div class="col-sm-8" >
	                    <select name="term" id="term" class="form-control form-control-sm" >
	                        <option value="">--Select--</option>
	                        <option value="Term I" @isset($mark->term) @if($mark->term=='Term I') selected="" @endif @endisset>Term I</option>
	                        <option value="Term II" @isset($mark->term) @if($mark->term=='Term II') selected="" @endif @endisset>Term II</option>
	                        <option value="Term III" @isset($mark->term) @if($mark->term=='Term III') selected="" @endif @endisset>Term III</option>
	                   </select>
	                </div>
	            </div> 
	            
	            <div class="form-group row">
	                <label for="student_from_date" class="col-sm-4 col-form-label">{{ __('Maths :') }}</label>
	                <div class="col-sm-8">
	                    <input type="text" class="form-control" id="maths_mark" name="maths_mark" placeholder="{{ __('Enter Maths Mark') }}" @isset($mark->maths_mark) value="{{ $mark->maths_mark }}" @endisset required="" onkeypress="return isNumberKey(event);" >
	                </div>
	            </div>
	            <div class="form-group row">
	                <label for="student_from_date" class="col-sm-4 col-form-label">{{ __('Science :') }}</label>
	                <div class="col-sm-8">
	                    <input type="text" class="form-control" id="science_mark" name="science_mark" placeholder="{{ __('Enter Science Mark') }}" @isset($mark->science_mark) value="{{ $mark->science_mark }}" @endisset required="" onkeypress="return isNumberKey(event);" >
	                </div>
	            </div>
	            <div class="form-group row">
	                <label for="student_from_date" class="col-sm-4 col-form-label">{{ __('History :') }}</label>
	                <div class="col-sm-8">
	                    <input type="text" class="form-control" id="history_mark" name="history_mark" placeholder="{{ __('Enter History Mark') }}" @isset($mark->history_mark) value="{{ $mark->history_mark }}" @endisset required="" onkeypress="return isNumberKey(event);" >
	                </div>
	            </div>             
	        </div>
	        <!-- /.card-body -->     
	    </div>
	    <div class="modal-footer ">
	        <button type="submit" class="btn btn-crm" id="saveBtn" @isset($mark) value="edit-mark" @else value="create-mark" @endisset>Save</button>
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
{{-- @endsection --}}