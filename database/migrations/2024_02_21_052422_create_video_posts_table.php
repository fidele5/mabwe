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
        Schema::create('video_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("post_category_id");
            $table->string("video_path");
            $table->string("caption");
            $table->string("title");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('video_posts', function (Blueprint $table){
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign("post_category_id")
                ->references("id")
                ->on("post_categories")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_posts');
    }
};
