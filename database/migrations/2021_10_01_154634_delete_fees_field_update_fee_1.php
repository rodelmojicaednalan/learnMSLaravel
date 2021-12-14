<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFeesFieldUpdateFee1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('curriculum', function (Blueprint $table) {
            $table->dropColumn('fees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('curriculum', function (Blueprint $table) {
            $table->float('fees', 20, 2)->nullable()->change();
        });
    }
}
