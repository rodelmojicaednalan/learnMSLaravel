<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsPublishedToOrcaClassLiveClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orca_class_live_class_schedules', function (Blueprint $table) {
            $table->integer('is_published')->nullable()->default(1)->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orca_class_live_class_schedules', function (Blueprint $table) {
            $table->dropColumn('is_published');
        });
    }
}
