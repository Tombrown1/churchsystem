<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_members', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('posted_id')->nullable();
            $table->integer('is_posted')->nullable();
            $table->integer('posted_count')->nullable();
            $table->integer('role')->nullable();
            $table->integer('suspension_id')->nullable();
            $table->integer('badge')->nullable();
            $table->integer('banned_id')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('work_phone');
            $table->string('home_phone');
            $table->string('dob');
            $table->string('pob');
            $table->string('passport');
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
            $table->string('born_again');
            $table->string('church_join_date');
            $table->string('unit_join_date');
            $table->string('membership_class');
            $table->string('water_baptism');
            $table->string('holyghost_baptism');
            $table->string('wofbi_id');
            $table->string('tither');
            $table->string('homecell_id');
            $table->string('hobbies');
            $table->softDeletesTz();
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
        Schema::dropIfExists('add_members');
    }
}
