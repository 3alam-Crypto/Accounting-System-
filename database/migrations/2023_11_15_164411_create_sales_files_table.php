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
        Schema::create('sales_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salesFileType_id')->constrained('sales_file_types');
            $table->foreignId('sale_id')->constrained('sales');
            $table->string('uploadFiles');
            $table->string('file_location')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_files');
    }
};
