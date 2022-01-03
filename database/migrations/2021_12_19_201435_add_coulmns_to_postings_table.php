<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoulmnsToPostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postings', function (Blueprint $table) 
        {
            $table->after('id', function($table){
                $table->foreignId('posted_by');
                $table->foreignId('unit_id');
            });

            // $table->after('duration', function($table){
            //     $table->timestamps('time_posted');
            //     $table->timestamps('end_time');
            // });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postings', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
