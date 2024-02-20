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
        Schema::create('company_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("company_id");
            $table->string("image_path");
            $table->string("title");
            $table->date("expire_at");
            $table->timestamps();
        });

        Schema::table('company_ads', function (Blueprint $table){
            $table->foreign("company_id")
                ->references("id")
                ->on("companies")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_ads');
    }
};
