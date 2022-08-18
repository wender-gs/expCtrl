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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_user');
            $table->date('date_expense');
            $table->string('recipient');
            $table->float('value_expense', 10, 2);
            $table->string('isPaidExpense', 4);
            $table->string('categoryExpense');
            $table->string('walletExpense');

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
        Schema::dropIfExists('expenses');
    }
};