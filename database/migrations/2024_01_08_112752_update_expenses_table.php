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
            // Remove due_charges column
            $table->dropColumn('due_charges');

            // Add new columns
            $table->date('expense_date')->nullable();
            $table->boolean('is_installment')->default(0);
            $table->text('description')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('project_department')->nullable();
            $table->tinyInteger('approval_status')->default(0);
            $table->tinyInteger('expense_status')->default(0);
            $table->string('expenses_title')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            // Re-add due_charges column if you ever need to revert this change
            $table->decimal('due_charges');

            // Drop the newly added columns
            $table->dropColumn('expense_date');
            $table->dropColumn('is_installment');
            $table->dropColumn('description');
            $table->dropColumn('payment_method');
            $table->dropColumn('vendor_name');
            $table->dropColumn('receipt_number');
            $table->dropColumn('employee_name');
            $table->dropColumn('project_department');
            $table->dropColumn('approval_status');
            $table->dropColumn('expense_status');
            $table->dropColumn('notes');
            $table->dropColumn('expenses_title');
        });
    }
};
