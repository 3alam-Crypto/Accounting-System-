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
            $table->unsignedBigInteger('country_id')->default(0);
            $table->string('department')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_file')->nullable();
            $table->string('citizen')->nullable();
            $table->date('contract_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['country', 'department', 'id_number', 'id_file_path', 'citizen', 'contract_end_date']);
        });
    }
};
