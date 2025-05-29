<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = new Admin;
        $Admin->name = 'Admin';
        $Admin->mobile = '8302243646';
        $Admin->password = Hash::make('8302243646');
        $Admin->save();
    }
}
