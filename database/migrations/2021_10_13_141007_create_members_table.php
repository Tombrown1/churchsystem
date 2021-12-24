<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('work_phone');
            $table->string('home_phone');
            $table->string('dob');
            $table->string('pob');
            $table->string('marital_status');
            $table->string('fname_next_of_kin');
            $table->string('lname_next_of_kin');
            $table->string('phone_next_of_kin');
            $table->string('relate_next_of_kin');
            $table->string('gender_next_of_kin');
            $table->string('address_next_of_kin');
            $table->string('employment_status');
            $table->string('profession');
            $table->string('area_of_specialization');
            $table->string('nationality');
            $table->string('state_origin');
            $table->string('lga');
            $table->string('town');
            $table->string('maiden_name');
            $table->string('resident_address'); 
            $table->string('category');
            $table->string('subunit_id');
            $table->text('hobbies');
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
        Schema::dropIfExists('members');
    }
}
