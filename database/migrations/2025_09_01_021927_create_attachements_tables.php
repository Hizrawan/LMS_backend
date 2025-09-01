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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->morphs('attachable');
            // polymorphic relation: bisa ke discussion_threads, discussion_replies, assignments, dll.
            $table->string('file_name');
            $table->string('file_path');   // path di storage
            $table->string('file_type')->nullable(); // pdf, jpg, png, zip, mp4
            $table->unsignedBigInteger('file_size')->default(0); // bytes
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // siapa yg upload
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
