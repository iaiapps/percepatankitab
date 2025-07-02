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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referral_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('payment_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_referral')->nullable();
            $table->string('nominal')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
