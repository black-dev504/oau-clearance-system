<?php

use App\Enums\ClearanceStatus;
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
        Schema::create('requests', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('graduation_year');
            $table->string('address');
            $table->string('course');
            $table->string('department');
            $table->tinyInteger('status')->default(ClearanceStatus::PENDING);
            $table->string('hall')->nullable();
            $table->string('block')->nullable();
            $table->integer('room_number')->nullable();
            $table->string('bed_space')->nullable();
            $table->boolean('library_reg_status')->default(false);
            $table->string('means_of_identification');
            $table->string('clearance_receipt');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
