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
        Schema::table('expenses_types', function (Blueprint $table) {
            $table->text('bounce')->nullable()->after('name');
            $table->text('punishment')->nullable()->after('bounce');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses_types', function (Blueprint $table) {
            $table->dropColumn(['bounce', 'punishment']);
        });
    }
};
