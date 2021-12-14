<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLiveClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orca_class_live_class_schedules', function (Blueprint $table) {
            $table->time('end_time')->nullable();
        });

        if (Schema::hasColumn('orca_class_live_class_schedules', 'endd_date')) {
            Schema::table('orca_class_live_class_schedules', function (Blueprint $table) {
                $table->dropColumn('endd_date');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orca_class_live_class_schedules', function (Blueprint $table) {
            $table->dropColumn('end_time');
        });
    }
}
