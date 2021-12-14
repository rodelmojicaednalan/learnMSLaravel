<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {

		$table->id();
		$table->integer('subject_id');
		$table->integer('trainer_id');
		$table->integer('slots');
		$table->integer('participants')->nullable();
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}