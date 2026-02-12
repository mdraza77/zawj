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
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            // (Sender)
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            // (Receiver)
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');

            // Status: pending, accepted, declined
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');

            $table->timestamps();

            $table->unique(['sender_id', 'receiver_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interests');
    }
};
