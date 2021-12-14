<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherLevelTable extends Migration
{
    public function up()
    {
        Schema::create('teacher_level', function (Blueprint $table) {

		$table->id();
		$table->integer('user_id')->nullable();
		$table->integer('level')->nullable();
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('teacher_level');
    }
}