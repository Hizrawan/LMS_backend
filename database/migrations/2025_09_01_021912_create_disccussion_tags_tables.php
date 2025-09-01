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
        Schema::create('discussion_tags', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->timestamps();
});

Schema::create('discussion_thread_tag', function (Blueprint $table) {
    $table->id();
    $table->foreignId('thread_id')->constrained('discussion_threads')->cascadeOnDelete();
    $table->foreignId('tag_id')->constrained('discussion_tags')->cascadeOnDelete();
    $table->unique(['thread_id', 'tag_id']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_thread_tag');
        Schema::dropIfExists('discussion_tags');
    }
};
