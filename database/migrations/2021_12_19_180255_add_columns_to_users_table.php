<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {           
            $table->after('id', function($table){
                $table->integer('subunit_id')->nullable();
                $table->string('username')->nullable();
            });

            $table->after('email_verified_at', function($table){
                $table->string('gender');
            });

            $table->after('remember_token', function($table){
                $table->integer('banned_id')->nullable();
                $table->integer('suspension_id')->nullable();
                $table->string('role')->nullable();
                $table->string('badge')->nullable();
                $table->softDeletesTz();
            });
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
            $table->dropColumn(['subunit_id', 'username', 'gender', 'banned_id', 'suspension_id', 'role', 'badge', 'deleted_at']);

        });
    }
}
