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
        Schema::create('discussion_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reply_id')->constrained('discussion_replies')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['up', 'down']);
            $table->timestamps();

            $table->unique(['reply_id', 'user_id']); // user hanya bisa 1 kali vote
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_votes');
    }
};
