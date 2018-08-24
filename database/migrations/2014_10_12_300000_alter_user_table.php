<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add additional columns
            $table->string('username')->unique()->after('name');
            $table->string('activation_code', 42)->after('password')->nullable();
            $table->boolean('confirmed')->after('activation_code')->default(false);
            $table->boolean('disabled')->after('confirmed')->default(true);
            $table->boolean('is_admin')->after('verified')->default(false);

            // Change default columns
            $table->unique('email')->index();
            $table->renameColumn('name', 'realname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
