<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('send_wallet');
            $table->string('receive_wallet');
            $table->string('sendAmount');
            $table->string('receiveAmount');
            $table->string('receiveAccount')->default(0);
            $table->string('email');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('status')->default('Pending');
            $table->string('user_transaction')->nullable();
            $table->string('user_transaction_email')->nullable();
            $table->string('usd2bdt_transaction')->unique();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
