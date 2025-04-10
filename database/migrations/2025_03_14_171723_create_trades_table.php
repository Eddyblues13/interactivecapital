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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('symbol'); // ETHUSD, TONUSD, XRPUSD etc.
            $table->string('type')->default('spot'); // spot, futures, margin
            $table->string('direction'); // UP (long), DOWN (short)
            $table->decimal('entry_price', 16, 4);
            $table->decimal('exit_price', 16, 4)->nullable();
            $table->decimal('amount', 16, 4); // 0.4 ETH, 0.7 TON etc.
            $table->decimal('profit', 16, 4)->nullable();
            $table->string('status'); // active, closed
            $table->dateTime('entry_date');
            $table->dateTime('exit_date')->nullable();
            $table->string('trader_name')->nullable(); // VirtualBacon etc.
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
