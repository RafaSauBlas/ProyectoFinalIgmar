<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'keneth Efrem',
            'lastname' => 'Reyes Rubio',
            'branchoffice' => 'Monterrey',
            'email' => 'kenneth25@gmail.com',
            'password' => bcrypt('12345678'),
            'area' => 2
        ]);

        // $user2 = User::create([
        //     'name' => '',
        //     'lastname' => '',
        //     'branchoffice' => '',
        //     'email' => '',
        //     'password' => bcrypt(),
        //     'area' => 2
        // ]);


        // $user3 = User::create([
        //     'name' => '',
        //     'lastname' => '',
        //     'branchoffice' => '',
        //     'email' => '',
        //     'password' => bcrypt(),
        //     'area' => 2
        // ]);



    }
}
