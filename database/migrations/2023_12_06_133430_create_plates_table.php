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
        Schema::create('plates', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->string('ingredients')->nullable();
            $table->string('cover_image')->nullable();
            $table->decimal('price', 4, 2)->nullable();
            $table->boolean('is_available')->default(true);
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};
