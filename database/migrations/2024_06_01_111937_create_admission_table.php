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
        Schema::create('admission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('admission_date')->nullable();
            $table->integer('session')->nullable();
            $table->enum('status', ['rejected', 'confirmed', 'pending', 'in process'])->default('in process')->nullable();
            $table->integer('admission_amount')->nullable();
            $table->enum('admission_fee', ['paid', 'unpaid'])->default('unpaid')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission');
    }
};
