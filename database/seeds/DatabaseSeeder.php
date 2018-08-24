<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username'  => 'admin',
            'realname'  => 'Super Admin',
            'email'     => 'admin@localhost',
            'password'  => Hash::make('admin'),
            'confirmed' => true,
            'disabled'  => false,
            'is_admin'  => true,
            'remember_token' => str_random(10),
        ]);

        $this->call(RecordTypeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(RecordTypeEnableSeeder::class);
    }
}
