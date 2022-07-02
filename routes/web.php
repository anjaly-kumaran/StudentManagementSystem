<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if (Auth::user()) {
		return redirect()->route('home');
	}
	else {
	    return view('auth.login');
	}
});

Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function(){
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	
	Route::get('/students/list', [StudentController::class, 'listStudents'])->name('students.list');

	Route::get('students/create',[StudentController::class,'createStudent'])->name('students.create');
	Route::post('students/create',[StudentController::class,'storeStudent'])->name('students.store');

	Route::get('students/edit/{id}',[StudentController::class,'editStudent'])->name('students.edit');
	Route::post('students/edit/{id}',[StudentController::class,'updateStudent'])->name('students.update');

	Route::get('students/delete/{id}',[StudentController::class,'deleteSTudent'])->name('students.delete');
	Route::post('students/delete/{id}',[StudentController::class,'deleteSTudent'])->name('students.delete');

	Route::get('/marks/list', [MarksController::class, 'listStudentMarks'])->name('marks.list');

	Route::get('marks/create',[MarksController::class,'createStudentMark'])->name('marks.create');
	Route::post('marks/create',[MarksController::class,'storeStudentMark'])->name('marks.store');

	Route::get('marks/edit/{id}',[MarksController::class,'editStudentMark'])->name('marks.edit');
	Route::post('marks/edit/{id}',[MarksController::class,'updateStudentMark'])->name('marks.update');

	Route::get('marks/delete/{id}',[MarksController::class,'deleteSTudentMark'])->name('marks.delete');
	Route::post('marks/delete/{id}',[MarksController::class,'deleteSTudentMark'])->name('marks.delete');

});
