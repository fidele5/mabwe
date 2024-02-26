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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("text");
            $table->string("image");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("post_category_id");
            $table->integer("views")->default(0)->nullable();
            $table->string("external_link")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function (Blueprint $table){
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
        Schema::dropIfExists('posts');
    }
};
