<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([
            'title' => 'Belajar Laravel',
            'description' => 'Mempelajari konsep dasar Laravel seperti routing, controller, dan view.',
            'is_done' => 1,
            'user_id' => 1,
        ]);

        Todo::create([
            'title' => 'Membuat Aplikasi To-Do List',
            'description' => 'Membuat aplikasi sederhana untuk mengelola daftar tugas menggunakan Laravel.',
            'is_done' => 1,
            'user_id' => 2,
        ]);

        Todo::create([
            'title' => 'Mengimplementasikan Reset Password',
            'description' => 'Menerapkan fitur reset password pada aplikasi untuk meningkatkan keamanan.',
            'is_done' => 0,
            'user_id' => 3,
        ]);

        Todo::create([
            'title' => 'Buat filter',
            'description' => 'Membuat fitur filter untuk menampilkan daftar tugas berdasarkan status.',
            'is_done' => 1,
            'user_id' => 4,
        ]);

        Todo::create([
            'title' => 'Buat orang tua bangga',
            'description' => 'Selalu berusaha untuk membuat orang tua bahagia dengan prestasi yang diraih.',
            'is_done' => 0,
            'user_id' => 5,
        ]);
    }
}
