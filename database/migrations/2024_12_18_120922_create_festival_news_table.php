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
        Schema::create('festival_news', function (Blueprint $table) {
            $table->id();
            $table->foreign('festival_id')->references('id')->on('festivals');
            $table->text('content');
            $table->string('title', 255);
            $table->mediumText('header_image')->charset('binary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival_news');
    }
};
