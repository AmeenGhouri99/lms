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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('fsc_pre_eng_can_apply')->default(0)->nullable();
            $table->integer('fsc_pre_eng_60_percentage_for_engineering_programs')->default(0)->nullable();
            $table->boolean('fsc_pre_med_can_apply')->default(0)->nullable();
            $table->boolean('dae_chemical')->default(0)->nullable();
            $table->boolean('dae_mechanical')->default(0)->nullable();
            $table->boolean('dae_civil')->default(0)->nullable();
            $table->boolean('dae_electrical')->default(0)->nullable();
            $table->boolean('dae_chemical_with_60_percentage')->default(0)->nullable();
            $table->boolean('dae_electrical_with_60_percentage')->default(0)->nullable();
            $table->boolean('fa_simple_can_apply')->default(0)->nullable();
            $table->boolean('fa_with_it_math_can_apply')->default(0)->nullable();
            $table->boolean('icom_can_apply')->default(0)->nullable();
            $table->boolean('ics_can_apply')->default(0)->nullable();
            $table->enum('merit', ['quota', 'open_merit', 'both'])->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('is_entry_test_required')->default(0)->nullable();
            $table->boolean('is_university_test_required')->default(0)->nullable();
            $table->foreign('parent_id')->references('id')->on('programs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
