<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecordrs = [
            ['name' => 'Admin', 'mobile'=>9800000000, 'email'=> 'admin8@admin.com', 'password'=>$password, 'image'=>'', 'status'=>1],
        ];
        Admin::insert($adminRecordrs);
    }
}
