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
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Aries');
            $table->string('Taurus');
            $table->string('Gemini');
            $table->string('Cancer');
            $table->string('Leo');
            $table->string('Virgo');
            $table->string('Libra');
            $table->string('Scorpio');
            $table->string('Sagittarius');
            $table->string('Capricorn');
            $table->string('Aquarius');
            $table->string('Pisces');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horoscopes');
    }
};
