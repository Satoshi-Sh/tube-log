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
        Schema::create('video_category', function (Blueprint $table) {
            $table->id();
            $table->string('video_id');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->foreignIdFor(App\Models\Category::class, 'category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_category');
    }
};
