<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$5dtMj/sxqap0Id16kqhtJ.Yz88CEvSTAqbiKTnW71L2ThTu4cn2im', // password
            
        ]);
        $user->assignRole('writer', 'admin');
    }
}
