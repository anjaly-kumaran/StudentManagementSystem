<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Mark extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    /*public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }*/

    /*public function term()
    {
        return $this->belongsTo(Term::class,'term_id');
    }*/

    public function user()
    {
        return $this->belongsTo(User::class,'added_by');
    }

    /*public function total_mark()
    {
        return $this->select(DB::raw('`maths_mark` + `science_mark` as total'));
    }*/
}
