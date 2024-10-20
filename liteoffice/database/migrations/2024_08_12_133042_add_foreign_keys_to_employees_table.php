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
        Schema::table('employees', function (Blueprint $table) {
            $table->uuid('profile_id')->constrained()->cascadeOnDelete();
            $table->uuid('department_id')->constrained()->cascadeOnDelete();
            $table->uuid('business_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['business_id']);
        });
    }
};
