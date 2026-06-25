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
        Schema::table('hostels', function (Blueprint $table) {
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->enum('gender', ['male', 'female']);
            $table->string('warden');
            $table->enum('status', ['active', 'inactive'])->default('active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hostels', function (Blueprint $table) {
            $table->dropColumn('unit_id');
            $table->dropColumn('code');
            $table->dropColumn('gender');
            $table->dropColumn('warden');
            $table->dropColumn('status');
        });
    }
};
