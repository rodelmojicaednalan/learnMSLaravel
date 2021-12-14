<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcaClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orca_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('orca_curricula_id')->nullable();
            $table->text('orca_categories_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->string('cover_photo')->nullable();
            $table->integer('is_published')->nullable();
            $table->string('class_type')->nullable();
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
        Schema::dropIfExists('orca_classes');
    }
}
