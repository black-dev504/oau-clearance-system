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
        Schema::table('clearance_requests', function (Blueprint $table) {
            $table->string('library_receipt')->nullable();
            $table->string('library_card')->nullable();
            $table->string('library_reg_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clearance_requests', function (Blueprint $table) {
            //
        });
    }
};
