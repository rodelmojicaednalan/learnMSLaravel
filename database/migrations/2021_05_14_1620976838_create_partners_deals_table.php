<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersDealsTable extends Migration
{
    public function up()
    {
        Schema::create('partners_deals', function (Blueprint $table) {

		$table->id();
		$table->string('partner',181)->nullable()->default('NULL');
		$table->text('deals_description');
		$table->text('terms');
		$table->string('image_url')->nullable()->default('NULL');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('partners_deals');
    }
}