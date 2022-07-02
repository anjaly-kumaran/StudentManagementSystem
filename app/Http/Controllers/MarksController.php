<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Term;

class MarksController extends Controller
{
    public function listStudentMarks(Request $request)
    {	
    	$marks    = Mark::paginate(10);
    	return view('marks.list',compact('marks'));
    }

    public function createStudentMark(Request $request)
    {	
    	$students = Student::where('status',1)->get();
    	
    	return view('marks.create',compact('students'));
    }

    public function storeStudentMark(Request $request)
    {
    	$rules = [
            'student'   => 'required',
			'term'     => 'required',
			'maths_mark'     => 'required|numeric',
			'science_mark'     => 'required|numeric',
			'history_mark'  => 'required|numeric',
        ];
        $customMessages = [];

        $validatedData = $this->validate($request, $rules, $customMessages);

        $mark 				= new Mark();
        $mark->student_id   	= trim($request->student);
		$mark->term   		= trim($request->term);
		$mark->maths_mark   		= trim($request->maths_mark);
		$mark->science_mark   	= trim($request->science_mark);
		$mark->history_mark        = trim($request->history_mark);
		$mark->save();

		if($mark){
			return response()->json(['status'=>'success','message'=>'Student Mark added successfully']);
		}else{
        	return response()->json(['status'=>'success','message'=>'Student mark add failed']);
		}
    }

    public function editStudent(Request $request,$id)
    {	
    	$students = Student::where('status',1)->get();
    	$mark  = Mark::find($id);
        if(!$mark)
            return response()->json(['status'=>'error','message'=>'Mark details not found']);
     
    	return view('marks.create',compact('students','mark'));
    }

    public function updateStudent(Request $request,$id)
    {
    	$rules = [
            'student'   => 'required',
			'term'     => 'required',
			'maths_mark'     => 'required|numeric',
			'science_mark'     => 'required|numeric',
			'history_mark'  => 'required|numeric',
        ];
        $customMessages = [];

        $validatedData = $this->validate($request, $rules, $customMessages);

        $mark                   = Mark::find($id);
        if(!$mark)
            return response()->json(['status'=>'error','message'=>'Student mark details not found']);

        $mark->student_id   	= trim($request->student);
		$mark->term   		= trim($request->term);
		$mark->maths_mark   		= trim($request->maths_mark);
		$mark->science_mark   	= trim($request->science_mark);
		$mark->history_mark        = trim($request->history_mark);
		$mark->save();

		if($mark){
			return response()->json(['status'=>'success','message'=>'Student details edited successfully']);
		}else{
        	return response()->json(['status'=>'success','message'=>'Student details updation failed']);
		}
    }

    public function deleteSTudent(Request $request,$id)
    {
    	$mark  = Mark::find($id);
        if(!$mark)
            return response()->json(['status'=>'error','message'=>'Student mark details not found']);
        //$deletedRows = Student::find($id)->delete();
        $deletedRows = $mark->delete();
        if($deletedRows>0){
        	return response()->json(['status' => 'success',  'message'=>'student mark deleted successfully.']);
        }
		else{
			return response()->json(['status' => 'error','message'=>'Failed to delete student mark']);
		}
    }
}
