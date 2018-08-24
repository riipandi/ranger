<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTsigKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsigkeys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('domain_id')->index();
            $table->string('name')->index();
            $table->string('algorithm', 50)->index();
            $table->string('secret');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tsigkeys');
    }
}
