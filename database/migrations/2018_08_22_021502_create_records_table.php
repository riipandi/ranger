<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('domain_id')->index();
            $table->string('name')->index();
            $table->string('type', 10)->index();
            $table->longText('content');
            $table->unsignedInteger('ttl')->nullable();
            $table->unsignedSmallInteger('prio')->nullable();
            $table->unsignedInteger('change_date')->nullable();
            $table->boolean('disabled')->default(false);
            $table->string('ordername')->index();
            $table->boolean('auth')->default(true);

            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
