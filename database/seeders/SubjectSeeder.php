<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insertOrIgnore(['name' => 'Maths','status'=>1]);
        DB::table('subjects')->insertOrIgnore(['name' => 'Science','status'=>1]);
        DB::table('subjects')->insertOrIgnore(['name' => 'History','status'=>1]);
        
    }
}
