<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Term;

class StudentController extends Controller
{
    public function listStudents(Request $request)
    {	
    	$students = Student::where('status',1)->paginate(10);

    	return view('students.list',compact('students'));
    }

    public function createStudent(Request $request)
    {	
    	$teachers = Teacher::where('status',1)->get();
    	
    	return view('students.create',compact('teachers'));
    }

    public function storeStudent(Request $request)
    {
    	$rules = [
            'name'   => 'required',
			'age'     => 'required|numeric|min:6|max:99',
			'gender'  => 'required',
			'reporting_teacher' => 'required'
        ];
        $customMessages = [];

        $validatedData = $this->validate($request, $rules, $customMessages);

        $student 				= new Student();
        $student->name   		= trim($request->name);
		$student->age   		= trim($request->age);
		$student->gender   		= trim($request->gender);
		$student->teacher_id   	= trim($request->reporting_teacher);
		$student->status        = 1;
		$student->save();

		if($student){
			return response()->json(['status'=>'success','message'=>'Student created successfully']);
		}else{
        	return response()->json(['status'=>'success','message'=>'Student creation failed']);
		}
    }

    public function editStudent(Request $request,$id)
    {	
    	$teachers = Teacher::where('status',1)->get();
    	$student  = Student::find($id);
        if(!$student)
            return response()->json(['status'=>'error','message'=>'Student details not found']);
     
    	return view('students.create',compact('teachers','student'));
    }

    public function updateStudent(Request $request,$id)
    {
    	$rules = [
            'name'   => 'required',
			'age'     => 'required|numeric|min:6|max:99',
			'gender'  => 'required',
			'reporting_teacher' => 'required'
        ];
        $customMessages = [];

        $validatedData = $this->validate($request, $rules, $customMessages);

        $student                   = Student::find($id);
        if(!$student)
            return response()->json(['status'=>'error','message'=>'Student details not found']);

        $student->name   		= trim($request->name);
		$student->age   		= trim($request->age);
		$student->gender   		= trim($request->gender);
		$student->teacher_id   	= trim($request->reporting_teacher);
		$student->status        = 1;
		$student->save();

		if($student){
			return response()->json(['status'=>'success','message'=>'Student updated successfully']);
		}else{
        	return response()->json(['status'=>'success','message'=>'Student update failed']);
		}
    }

    public function deleteSTudent(Request $request,$id)
    {
    	$student  = Student::find($id);
        if(!$student)
            return response()->json(['status'=>'error','message'=>'Student details not found']);
        //$deletedRows = Student::find($id)->delete();
        $deletedRows = $student->delete();
        if($deletedRows>0){
        	return response()->json(['status' => 'success',  'message'=>'student deleted successfully.']);
        }
		else{
			return response()->json(['status' => 'error','message'=>'Failed to delete student']);
		}
    }
}
