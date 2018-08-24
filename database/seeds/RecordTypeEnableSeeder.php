<?php

use Illuminate\Database\Seeder;
use App\RecordType;

class RecordTypeEnableSeeder extends Seeder
{
    public function run()
    {
        $types = ['A', 'AAAA', 'ALIAS', 'CNAME', 'MX', 'NS', 'PTR', 'SOA', 'SPF', 'SRV', 'TXT'];

        $rt = RecordType::get();
        foreach ($types as $type) {
            DB::table('recordtype')->where('name', $type)->update(['disabled' => false]);
        }
    }
}
