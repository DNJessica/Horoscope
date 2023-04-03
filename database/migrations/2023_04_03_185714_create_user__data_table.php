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
        Schema::create('user__data', function (Blueprint $table) {
            $table->id();
            $table->integer('login_id');
            $table->string('name');
            $table->string('last_name');
            $table->dateTime('birth_date');
            $table->string('zodiac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__data');
    }
};
