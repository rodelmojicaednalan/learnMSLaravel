<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->comment('ID of School')->nullable();
            $table->foreignId('user_id')->comment('ID of School Teacher');
            $table->string('highest_education_qualification')->nullable();
            $table->string('name_of_institution')->nullable();
            $table->string('country_of_incorporation')->nullable();
            $table->string('spoken_language')->nullable();
            $table->string('profile_picture')->nullable();
            $table->longText('description')->nullable();
            $table->string('related_skills')->nullable();
            $table->string('moe_registration_number')->nullable();
            $table->integer('moe_registration_number_verified')->default(0);
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
        Schema::dropIfExists('teacher_details');
    }
}
