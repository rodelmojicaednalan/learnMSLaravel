<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildTable extends Migration
{
    public function up()
    {
        Schema::create('child', function (Blueprint $table) {

		$table->id();
		$table->integer('parent_id');
		$table->string('firstname');
		$table->string('middlename')->nullable()->default('NULL');
		$table->string('lastname');
		$table->date('birthdate');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('child');
    }
}