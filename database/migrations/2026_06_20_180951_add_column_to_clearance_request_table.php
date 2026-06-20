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
            $table->unsignedInteger('required_units_count')->after('status');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clearance_requests', function (Blueprint $table) {
            $table->dropColumn('required_units_count');
        });
    }
};
