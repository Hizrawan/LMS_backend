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
        Schema::create('discussion_threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lesson_id')->nullable()->constrained()->cascadeOnDelete();
            // jika diskusi spesifik ke lesson
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // siapa yg bikin thread
            $table->string('title');
            $table->longText('content');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_threads');
    }
};
