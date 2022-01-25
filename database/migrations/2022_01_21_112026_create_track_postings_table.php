<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackPostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_postings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('member_id');
            $table->foreignId('subunit_id');
            $table->foreignId('posting_status');
            $table->foreignId('unit_id')->nullable();
            $table->Integer('start_date');
            $table->Integer('expired_at');
            $table->Integer('duration');
            $table->Integer('is_terminated')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('track_postings');
    }
}
