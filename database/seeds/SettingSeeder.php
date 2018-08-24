<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'default_dns1'        => 'dns1.semut.org',
            'default_dns2'        => 'dns2.semut.org',
            'default_ttl'         => '3600',
            'enable_registration' => 'false',
        ];

        foreach ($data as $key => $val) {
            Setting::create(['key' => $key, 'value' => $val]);
        }
    }
}
