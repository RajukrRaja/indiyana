<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('location');
            $table->integer('time_delta')->default(0); // Seconds since last transaction
            $table->string('payment_intent_id')->nullable();
            $table->boolean('verified')->default(false);
            $table->integer('risk_score')->default(0);
            $table->boolean('is_fraud')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}