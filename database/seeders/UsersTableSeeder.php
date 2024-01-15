<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users') -> insert(
            [
                [
                    'name' => 'Ahmet',
                    'email' => 'Ahmet123@hotmail.com',
                    'password' => '123'
                ],
                [
                    'name' => 'Mehmet',
                    'email' => 'Mehmet321@hotmail.com',
                    'password' => '321'
                ]
        ]);
    }
}
