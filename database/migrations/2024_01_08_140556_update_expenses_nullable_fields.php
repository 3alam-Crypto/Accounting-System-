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
        Schema::table('expenses', function (Blueprint $table) {
            
            $table->decimal('installment_amount')->nullable()->change();
            $table->integer('installment_count')->nullable()->change();
            $table->decimal('amount')->nullable()->change();
            $table->date('due_date')->nullable()->change();
            $table->decimal('charges')->nullable()->change();
            $table->string('period')->nullable()->change();
            $table->string('priority')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
