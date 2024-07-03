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
            $table->date('admission_start_date')->nullable();
            $table->date('admission_end_date')->nullable();
            $table->string('admission_term')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admission', function (Blueprint $table) {
            $table->dropColumn('admission_start_date');
            $table->dropColumn('admission_end_date');
            $table->dropColumn('admission_term');
        });
    }
};
