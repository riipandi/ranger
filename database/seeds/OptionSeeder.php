<?php

use Illuminate\Database\Seeder;
use App\Setting;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        option([
            'default_dns1' => 'dns1.semut.org',
            'default_dns2' => 'dns2.semut.org',
            'default_ttl'  => '3600',
        ]);
    }
}
