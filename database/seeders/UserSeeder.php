<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'photo_id' => '1',
            'name' => 'Henry Gomez',
            'email' => 'henry.r0701@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');

        User::factory(99)->create();
    }
}
