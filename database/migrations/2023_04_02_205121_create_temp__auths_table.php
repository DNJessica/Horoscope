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
        Schema::create('temp__auths', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('username');
            $table->string('pass');
            $table->string('verification_code');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->dateTime('birth_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp__auths');
    }
};
