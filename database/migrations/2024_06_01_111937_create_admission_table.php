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
            $table->unsignedBigInteger('first_program_id');
            $table->unsignedBigInteger('second_program_id')->nullable();
            $table->unsignedBigInteger('3rd_program_id')->nullable();
            $table->unsignedBigInteger('4th_program_id')->nullable();
            $table->date('admission_date');
            $table->integer('session');
            $table->enum('status', ['rejected', 'confirmed', 'pending', 'in process'])->nullable();
            $table->integer('admission_amount')->nullable();
            $table->enum('admission_fee', ['paid', 'unpaid'])->nullable();
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
