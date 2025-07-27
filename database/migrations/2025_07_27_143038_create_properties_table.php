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
        Schema::create('properties', function (Blueprint $table) {
           $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // মালিকের ID
        $table->string('title');
        $table->text('description');
        $table->string('address');
        $table->decimal('rent_price', 8, 2);
        $table->integer('bedrooms');
        $table->integer('bathrooms');
        $table->string('image')->nullable(); // ছবির জন্য
        $table->boolean('is_available')->default(true); // ভাড়া হয়েছে কি না
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
