<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->string('contact_number')->nullable()->after('address');
            $table->string('company_registration_number')->nullable()->after('address');
            $table->string('country_of_incorporation')->nullable()->after('address');
            $table->string('languages')->nullable()->after('address');
            $table->string('website')->nullable()->after('address');
            $table->integer('number_of_teachers')->nullable()->after('address');
            $table->integer('is_approved')->nullable()->default(0)->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
}
