<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('classes_schedules', function (Blueprint $table) {

		$table->id();
		$table->integer('class_id');
		$table->date('start_date');
		$table->time('start_time');
		$table->time('end_time');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('classes_schedules');
    }
}