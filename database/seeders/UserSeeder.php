<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ADMIN APOTEK',
            'email' => 'admin10@gmail.com',
            'password' => Hash::make('adminapotek'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir Apotek',
            'email' => 'kasir10@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);
        
    }
}
