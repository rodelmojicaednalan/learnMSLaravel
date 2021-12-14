<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {

		$table->id();
		$table->date('payment_date');
		$table->string('description',181);
		$table->double('amount', 10, 2);
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
}