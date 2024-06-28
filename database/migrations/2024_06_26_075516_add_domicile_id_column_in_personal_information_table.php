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
        Schema::table('personal_information', function (Blueprint $table) {
            $table->unsignedBigInteger('domicile_id')->nullable();
            $table->foreign('domicile_id')->references('id')->on('domiciles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            // Use the convention name for the foreign key constraint
            $table->dropForeign(['domicile_id']);
            $table->dropColumn('domicile_id');
        });
    }
};
