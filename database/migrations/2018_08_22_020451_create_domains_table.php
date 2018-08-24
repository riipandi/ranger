<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Database schema using official PowerDNS Documentation
     * https://doc.powerdns.com/authoritative/backends/generic-postgresql.html
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->index();
            $table->string('master', 128)->nullable();
            $table->unsignedInteger('last_check')->nullable();
            $table->string('type', 6);
            $table->unsignedInteger('notified_serial')->nullable();
            $table->string('account', 40);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
