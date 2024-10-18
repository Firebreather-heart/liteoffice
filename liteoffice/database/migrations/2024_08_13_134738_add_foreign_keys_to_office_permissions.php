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
        Schema::table('office_permissions', function (Blueprint $table) {
            $table->uuid('business_id')->constrained()->cascadeOnDelete();
            $table->uuid('office_role_id')->constrained()->cascadeOnDelete();
            $table->uuid('business_item_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('office_permissions', function (Blueprint $table) {
            $table->dropForeign(['business_id']);
            $table->dropForeign(['office_role_id']);
            $table->dropForeign(['business_item_id']);
        });
    }
};
