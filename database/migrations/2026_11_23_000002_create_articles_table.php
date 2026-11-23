<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('summary', 500);
            $table->longText('body');
            $table->timestamp('published_at')->nullable();
            $table->string('permalink')->unique();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('published')->index();
            $table->string('author')->nullable();
            $table->timestamps();

            $table->index(['status', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
