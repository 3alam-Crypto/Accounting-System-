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
        $brands = [
            'RADWAG' => 'RD',
            'BENCHMARK' => 'BC',
            'IKA' => 'IKA',
            'BRANDTECH' => 'BR',
            'JENCO INSTRUMENT' => 'JC',
            'MTC' => 'MT',
            'I.W TREMONT' => 'LW',
            'HUBER' => 'HB',
            'TPC DENTAL' => 'TCP',
            'DCI' => 'DC',
            'FLIGHT DENTAL' => 'FL',
            'BEYES' => 'BE',
            'VECTOR DENTAL' => 'VD',
            'LM SALISH MEDICAL' => 'LM',
            'BULK SCIENTIFIC' => 'BK',
            'ARTCO' => 'AR',
            'BIEN AIR' => 'BA',
            'BIOPLAST' => 'BT',
            'VELP' => 'VP',
            'AQUA PHOENIX' => 'AP',
            'BW TECHNOLOGIES' => 'BW',
            'Allied healthcare' => 'AH',
            'OTHERS' => 'OT',
        ];

        foreach ($brands as $name => $code) {
            DB::table('brands')->insert(['name' => $name, 'code' => $code]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
