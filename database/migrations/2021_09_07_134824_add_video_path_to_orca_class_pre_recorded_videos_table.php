<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoPathToOrcaClassPreRecordedVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orca_class_pre_recorded_videos', function (Blueprint $table) {
            $table->string('video_path')->nullable()->after('file_name');
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
            $table->dropColumn('video_path');
        });
    }
}
