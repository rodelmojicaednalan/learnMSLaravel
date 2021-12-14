<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('training_schedules', function (Blueprint $table) {

		$table->id();
		$table->integer('training_id');
		$table->date('start_date');
		$table->time('start_time');
		$table->time('end_time');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('training_schedules');
    }
}