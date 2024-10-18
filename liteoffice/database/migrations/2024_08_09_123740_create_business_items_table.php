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
        Schema::create('business_items', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();

            $table->string('name');
            $table->string('description');
            $table->string('price')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable();
            $table->string('item_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_items');
    }
};
