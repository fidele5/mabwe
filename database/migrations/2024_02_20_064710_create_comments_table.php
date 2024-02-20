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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string("email");
            $table->unsignedBigInteger("post_id");
            $table->text("text");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table("comments", function (Blueprint $table){
            $table->foreign("post_id")
                ->references("id")
                ->on("posts")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
