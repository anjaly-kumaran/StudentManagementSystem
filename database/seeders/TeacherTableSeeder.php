<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insertOrIgnore(['name' => 'Teacher 1','email' => 'teacher1@demo.com','status'=>1]);
        DB::table('teachers')->insertOrIgnore(['name' => 'Teacher 2','email' => 'teacher2@demo.com','status'=>1]);
    }
}
