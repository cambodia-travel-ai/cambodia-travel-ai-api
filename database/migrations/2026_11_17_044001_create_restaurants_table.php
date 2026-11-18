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
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('destination_id')->nullable()->constrained('destinations')->nullOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('image_url')->nullable();
            $table->string('price_range', 50)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->integer('rating')->nullable();
            $table->string('status', 20)->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
