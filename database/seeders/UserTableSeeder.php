<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore(['name' => 'Super Admin','username' => 'superadmin','email' => 'superadmin@gmail.com','password' => Hash::make('admin@123'),'status'=>1]);
        DB::table('users')->insertOrIgnore(['name' => 'Admin','username' => 'admin','email' => 'dmin@gmail.com','password' => Hash::make('admin@123'),'status'=>1]);
    }
}
