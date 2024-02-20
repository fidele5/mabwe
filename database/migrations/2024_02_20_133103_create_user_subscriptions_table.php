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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("subscription_id");
            $table->date("start_date");
            $table->date("end_date");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('user_subscriptions', function (Blueprint $table){
            $table->foreign('user_id')
                ->references('id')
                ->on("users")
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign("subscription_id")
                ->references("id")
                ->on("subscriptions")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
