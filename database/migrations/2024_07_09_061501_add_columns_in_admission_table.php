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
        Schema::table('admission', function (Blueprint $table) {
            $table->string('e_cat_roll_no')->nullable();
            $table->integer('e_cat_obtained_marks')->nullable();
            $table->integer('e_cat_total_marks')->nullable();
            $table->boolean('is_e_cat_attempt')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admission', function (Blueprint $table) {
            $table->dropColumn('e_cat_roll_no');
            $table->dropColumn('e_cat_obtained_marks');
            $table->dropColumn('e_cat_total_marks');
            $table->dropColumn('is_e_cat_attempt');
        });
    }
};
