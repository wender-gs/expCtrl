<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_user');
            $table->date('transactionDate');
            $table->string('drawer', 100);
            $table->float('transactionValue', 8, 2);
            $table->boolean('isPaid');
            $table->string('category', 100);
            $table->string('wallet', 100);
            $table->string('transactionIdentifier');
            $table->timestamps();
            $table->foreign('fk_id_user')->references('id')->on('users')->onDelete('CASCADE');
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
};
