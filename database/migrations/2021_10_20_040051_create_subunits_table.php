<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubunitsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * $table->integer('member_status')->default(0);
     * @return void
     */
    public function up()
    {
        Schema::create('subunits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
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
        Schema::dropIfExists('subunits');
    }
}
