<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(OptionSeeder::class);
        $this->call(RecordTypeSeeder::class);
        $this->call(RecordTypeEnableSeeder::class);
    }
}
