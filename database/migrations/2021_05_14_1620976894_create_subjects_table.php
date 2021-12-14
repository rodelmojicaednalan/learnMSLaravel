<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {

		$table->id();
		$table->string('subject',181);
		$table->double('fee', 10, 2);
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}