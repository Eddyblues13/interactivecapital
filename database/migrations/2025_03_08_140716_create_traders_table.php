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
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable(); // Trader profile picture
            $table->boolean('is_verified')->default(false); // Verification status
            $table->string('verified_badge')->nullable(); // Verified badge SVG or image path
            $table->string('name'); // Trader's name
            $table->decimal('return_rate', 5, 2)->default(0.00); // Return Rate percentage
            $table->integer('followers')->default(0); // Number of followers
            $table->integer('profit_share')->default(0); // Profit share percentage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traders');
    }
};
