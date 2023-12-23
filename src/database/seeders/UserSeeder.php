<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'image' => '',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_name' => 'aaaaa',
                'email' => 'aaaaa_u@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('aaaaaaaaaa'),
                'image' => '',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_name' => 'bbbbb',
                'email' => 'bbbbb_u@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('bbbbbbbbbb'),
                'image' => '',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_name' => 'ccccc',
                'email' => 'ccccc_u@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('cccccccccc'),
                'image' => '',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
