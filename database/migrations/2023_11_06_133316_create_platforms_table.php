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
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $platforms = [
            'Ebay',
            'Ebay SPX',
            'Ebay Trust',
            'Amazon Canada',
            'Google',
            'J&K Innovation',
            'Other',
            'Ramo Turkey',
            'Ramo Trading',
            'Amazon',
            'Amazon Mexico',
        ];

        foreach ($platforms as $platform) {
            DB::table('platforms')->insert(['name' => $platform]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platforms');
    }
};
