<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add columns
        Schema::table('users', function(Blueprint $table){
            $table->integer('admin');
            $table->string('username');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove columns
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('admin');
            $table->dropColumn('username');
            $table->dropColumn('deleted_at');
        });
    }
}
