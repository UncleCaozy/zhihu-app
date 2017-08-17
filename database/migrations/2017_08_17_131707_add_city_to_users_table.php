<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('introduce')->nullable();
            $table->string('tel')->nullable();
            $table->string('job')->nullable();
            $table->string('love')->nullable();
            $table->string('page')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['city']);
            $table->dropColumn(['introduce']);
            $table->dropColumn(['tel']);
            $table->dropColumn(['job']);
            $table->dropColumn(['love']);
            $table->dropColumn(['page']);
        });
    }
}
