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
            $table->unsignedBigInteger('degree_level_applied_id');
            $table->unsignedBigInteger('first_program_id');
            $table->unsignedBigInteger('second_program_id')->nullable();
            $table->unsignedBigInteger('third_program_id')->nullable();
            $table->unsignedBigInteger('fourth_program_id')->nullable();
            $table->date('admission_date')->nullable();
            $table->integer('session')->nullable();
            $table->enum('status', ['rejected', 'confirmed', 'pending', 'in process'])->default('in process')->nullable();
            $table->integer('admission_amount')->nullable();
            $table->enum('admission_fee', ['paid', 'unpaid'])->default('unpaid')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('first_program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('second_program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('third_program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('fourth_program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('degree_level_applied_id')->references('id')->on('programs')->onDelete('cascade');
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
