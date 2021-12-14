<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumTable extends Migration
{
    public function up()
    {
        Schema::create('curriculum', function (Blueprint $table) {

		$table->id();
		$table->integer('level_id');
		$table->string('name',181);
		$table->string('type',181);
		$table->string('size',181);
		$table->string('path',181);
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('curriculum');
    }
}