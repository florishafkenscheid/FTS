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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrianed();
            $table->string('license_plate', 10);
            $table->timestamp('time_since_maintenance')->nullable();
            $table->unsignedInteger('odometer');
            $table->unsignedInteger('max_capacity')->default(35);
            $table->unsignedInteger('toilets');
            $table->string('brand', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};