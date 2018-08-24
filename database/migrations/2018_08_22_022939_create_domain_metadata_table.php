<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domainmetadata', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('domain_id')->index();
            $table->string('kind', 32);
            $table->longText('content');
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
        Schema::dropIfExists('domainmetadata');
    }
}
