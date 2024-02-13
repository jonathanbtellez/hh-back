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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_number')->unique();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('surname');
            $table->string('email');
            $table->unsignedBigInteger('number_phone');
            $table->string('location')->nullable();
            $table->enum('type',['Professional','Patient']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
