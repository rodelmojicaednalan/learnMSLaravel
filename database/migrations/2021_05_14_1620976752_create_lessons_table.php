<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {

		$table->id();
		$table->string('class',181)->nullable()->default('NULL');
		$table->date('class_date')->nullable();
		$table->time('class_start_time')->nullable();
		$table->time('class_end_time')->nullable();
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}