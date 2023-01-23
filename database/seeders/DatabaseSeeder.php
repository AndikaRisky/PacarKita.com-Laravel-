<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Talents;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andika Risky Faizatama',
            'no'=> '082136445690',
            'email'=> 'L200200074@student.ums.ac.id',
            'address' => "Blora,Jawa Tengah",
            'email_verified_at' => now(),
            'isAdmin'=> true,
            'password'=> Hash::make('andika31')
        ]);
        Talents::create([
            'Nama' => 'Vika Aprilia Alfiani',
            'Deskripsi'=> 'Gak Jadi',
            'Umur'=> 20,
            'Alamat' => "Blora,Jawa Tengah",
            'No'=> '082136445690',
            'Image'=> '-'
        ]);
        User::factory(10)->create();
        Talents::factory(15)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
