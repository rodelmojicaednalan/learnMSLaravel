<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTempUploadToOrcaClassPreRecordedVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orca_class_pre_recorded_videos', function (Blueprint $table) {
            $table->integer('temp_upload')->after('duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orca_class_pre_recorded_videos', function (Blueprint $table) {
            $table->dropColumn('temp_upload');
        });
    }
}
