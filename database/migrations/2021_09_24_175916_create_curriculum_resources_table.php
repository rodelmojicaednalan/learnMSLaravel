<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_resources', function (Blueprint $table) {
            $table->id();
            $table->integer('curr_id');
            $table->string('name',181);
            $table->string('view_type',181);
            $table->string('type',181);
            $table->string('size',181);
            $table->string('description',181);
            $table->string('path',181);
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
        Schema::dropIfExists('curriculum_resources');
    }
}
