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
            $table->string('code')->nullable()->after('name');
            $table->timestamps();
        });

        $brands = [
            'OHAUS' => 'OH',
            'A&D' => 'AD',
            'Sartorius STR' => 'STR',
            'ADAM AE' => 'AE',
            'CAS CS' => 'CS',
            'Detecto DT' => 'DT',
            'CARDINAL CN' => 'CN',
            'RICE LAKE RL' => 'RL',
            'PENSYLVANIA PN' => 'BN',
            'VELAB' => 'VE',
            'TORREY TR' => 'TR',
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
