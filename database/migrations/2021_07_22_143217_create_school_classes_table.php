<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->comment('ID of School');
            $table->foreignId('user_id')->comment('ID of School Teacher');
            $table->foreignId('subject_id')->comment('ID of School Subject');
            $table->foreignId('level_id')->comment('ID of School Subject Level');
            $table->string('class')->nullable();
            $table->string('type');
            $table->integer('fee')->nullable();
            $table->longText('zoom_link', 255)->nullable();
            $table->longText('zoom_obj', 3000)->nullable();
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
        Schema::dropIfExists('school_classes');
    }
}
