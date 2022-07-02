<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terms')->insertOrIgnore(['name' => 'Term I','status'=>1]);
        DB::table('terms')->insertOrIgnore(['name' => 'Term II','status'=>1]);
        DB::table('terms')->insertOrIgnore(['name' => 'Term III','status'=>1]);
        
    }
}
