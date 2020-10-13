<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // $user = new User;
        // $user->name = 'user';
        // $user->role = 'u';
        // $user->email = 'user@user.com';
        // $user->password = Hash::make('user123');
        // $user->created_by = $user->idusers;
        // $user->save();
        $dbusers = [
            [
               'name' => 'admin',
               'role' => 'a',
               'email' => 'admin@admin.com',
               'password' =>  Hash::make('admin123'),
               'created_by' => '1',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'class',
                'role' => 'c',
                'email' => 'class@class.com',
                'password' =>  Hash::make('class123'),
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'business',
                'role' => 'b',
                'email' => 'business@business.com',
                'password' =>  Hash::make('business123'),
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'instructure',
                'role' => 'i',
                'email' => 'instructure@instructure.com',
                'password' =>  Hash::make('instructure123'),
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ],
             [
                'name' => 'user',
                'role' => 'a',
                'email' => 'user@user.com',
                'password' =>  Hash::make('user123'),
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ],
       ];

       DB::table('users')->insert($dbusers);
       
    }
}
