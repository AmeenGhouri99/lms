<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fee_chalan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admission_id');
            $table->string('payment_method');
            $table->string('admission_date')->nullable();
            $table->string('chalan_no');
            $table->integer('amount');
            $table->string('transaction_id');
            $table->string('deposited_date');
            $table->string('bank_name');
            $table->string('chalan_pic');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admission_id')->references('id')->on('admission')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_chalan');
    }
};
