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
        Schema::table('service_reports', function (Blueprint $table) {
            
            $table->string('problem_details')->nullable(); // Add nullable problem details column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_reports', function (Blueprint $table) {
            $table->dropColumn('problem_details'); // Drop problem details column
        });
    }
};