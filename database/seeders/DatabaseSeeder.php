<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            $this->call(MajorSeeder::class);
            $this->call(StudentSeeder::class);

        $users = [[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
        ]];
        // [
        //     'name' => 'Rahman',
        //     'email' => 'rahman@gmail.com',
        //     'password' => '123456',
        // ],
        // [
        //     'name' => 'Ilham',
        //     'email' => 'ilham@gmail.com',
        //     'password' => '123456',
        // ],
        // [
        //     'name' => 'Mahmud',
        //     'email' => 'mahmud@gmail.com',
        //     'password' => '123456',
        // ],
        // [
        //     'name' => 'Solikin',
        //     'email' => 'solikin@gmail.com',
        //     'password' => '123456',
        // ],
        // [
        //     'name' => 'Imam',
        //     'email' => 'imam@gmail.com',
        //     'password' => '123456',
        // ]];

        


        foreach ($users as $user) {
            User::create(
                $user
            );
        }

    }
}
