<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Zidan Herlangga',
            'email' => 'zidanherlangga24@gmail.com',
            'password' => bcrypt('zidan123'),
        ]);

        User::create([
            'name' => 'Kachi',
            'email' => 'kachiputih@gmail.com',
            'password' => bcrypt('kachi123'),
        ]);

        User::create([
            'name' => 'Novan Risqi',
            'email' => 'novanfyr@gmail.com',
            'password' => bcrypt('novan123'),
        ]);

        User::create([
            'name' => 'Rivaldy Zaky',
            'email' => 'rivaldyzaky@gmail.com',
            'password' => bcrypt('rivaldy123'),
        ]);

        User::create([
            'name' => 'Naufal Rafli R',
            'email' => 'naufalrafli@gmail.com',
            'password' => bcrypt('naufal123'),
        ]);
    }
}
