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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50)->unique();
            $table->string('address')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug');
            $table->string('phone')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');

        Schema::table('restaurants', function (Blueprint $table) {

            $table->dropForeign('restaurants_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
