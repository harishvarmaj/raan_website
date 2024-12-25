<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminId = DB::table('users')->insertGetId([
            'name' => 'Bill Admin',
            'email' => 'billadmin.local@mailinator.com',
            'password' => Hash::make('billadmin123'),
            'phone' => '1000010000'
        ]);

        DB::table('permissions')->insert([
            'name' => 'Billfiniti Admin',
            'user_id' => $adminId,
            'role_id' => 1,
            'is_active' => 1
        ]);

        DB::table('user_extras')->insert([
            'user_id' => $adminId,
            'access_token' => Str::random(10)
        ]);

        
    }
}
