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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('candidate_name');
            $table->string('candidate_cnic');
            $table->string('guardian_father_cnic');
            $table->string('guardian_father_occupation');
            $table->string('father_name');
            $table->string('guardian_father_monthly_income_in_rs');
            $table->string('annual_household_income');
            $table->string('religion');
            $table->string('hafiz_e_quran');
            $table->string('disability');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            // $table->unsignedBigInteger('domicile_id')->nullable();
            // $table->string('domicile');
            $table->string('phone_no');
            $table->string('email');
            $table->string('address');
            $table->string('permanent_address');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('domicile_id')->references('id')->on('domiciles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
