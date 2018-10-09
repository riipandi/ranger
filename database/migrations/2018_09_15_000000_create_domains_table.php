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
            $table->unsignedInteger('user_id')->default(1);
            $table->string('name')->unique()->index();
            $table->string('master', 128)->nullable();
            $table->unsignedInteger('last_check')->nullable();
            $table->string('type', 6);
            $table->unsignedInteger('notified_serial')->nullable();
            $table->date('expire_date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
