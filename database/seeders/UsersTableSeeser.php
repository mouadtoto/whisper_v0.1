<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i =0 ; $i < 10 ; $i++){
            \DB::table('users')->insert([
                'name' => "jhoneDoe",
                'email' => "jhone$i@gmail.com",
                'password' =>bcrypt('0000')
            ]);
        }
    }
}
