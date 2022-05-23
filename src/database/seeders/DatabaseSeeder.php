<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);

        $user = User::create([
            'name' => 'student',
            'surname' => 'surstudent',
            'birthday' => \Carbon\Carbon::now()->subYears(20),
            'email' => 'student@mail.com',
            'password' => bcrypt('123123123')
        ]);
        $user->assignRole('student');

        $user2 = User::create([
            'name' => 'teacher',
            'surname' => 'surteacher',
            'birthday' => \Carbon\Carbon::now()->subYears(40),
            'email' => 'prueba@mail.com',
            'password' => bcrypt('123123123')
        ]);
        $user2->assignRole('teacher');
    }
}
