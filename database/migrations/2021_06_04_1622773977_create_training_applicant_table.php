<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingApplicantTable extends Migration
{
    public function up()
    {
        Schema::create('training_applicant', function (Blueprint $table) {

		$table->id();
		$table->integer('training_id');
		$table->integer('user_id');
		$table->integer('status')->default(0);
		$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_applicant');
    }
}
