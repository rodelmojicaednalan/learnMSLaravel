<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('child', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('middlename');
            $table->string('full_name')->nullable()->after('parent_id');
            $table->string('gender')->nullable()->after('birthdate');
            $table->string('relationship')->nullable()->after('gender');
            $table->string('grade')->nullable()->after('relationship');
            $table->string('school')->nullable()->after('relationship');
            $table->string('spoken_language')->nullable()->after('school');
            $table->string('country_of_residency')->nullable()->after('spoken_language');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('child', function (Blueprint $table) {
            //
        });
    }
}
