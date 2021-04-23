<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserType;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create(['type'=>'admin']);
        UserType::create(['type'=>'president']);
        UserType::create(['type'=>'secretary']);
        UserType::create(['type'=>'treasurer']);
        UserType::create(['type'=>'staff']);

        User::create([
            'first_name' => 'Fadmin',
            'last_name' => 'FAdmin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => 'active',
            'password' => Hash::make('admin'),
        ]);
    }
}
