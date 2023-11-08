<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $brands = [
            'OHAUS',
            'A&D',
            'Sartorius STR',
            'ADAM AE',
            'CAS CS',
            'Detecto DT',
            'CARDINAL CN',
            'RICE LAKE RL',
            'PENSYLVANIA PN',
            'VELAB',
            'TORREY TR',
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert(['name' => $brand]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
