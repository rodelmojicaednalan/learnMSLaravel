<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelatedSkillsToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
        });

        if (Schema::hasColumn('schools', 'contact_number')) {

            Schema::table('schools', function (Blueprint $table) {
                $table->dropColumn('contact_number');
            });
        }

        if (Schema::hasColumn('schools', 'languages')) {

            Schema::table('schools', function (Blueprint $table) {
                $table->renameColumn('languages', 'spoken_language');
            });
        }

        if (!Schema::hasColumn('schools', 'related_skills')) {

            Schema::table('schools', function (Blueprint $table) {
                $table->string('related_skills')->nullable()->after('company_registration_number');
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
        Schema::table('schools', function (Blueprint $table) {
        });
    }
}
