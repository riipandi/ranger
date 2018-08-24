<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptokeys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('domain_id')->index();
            $table->unsignedInteger('flags');
            $table->boolean('active');
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
        Schema::dropIfExists('cryptokeys');
    }
}
