<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomisiController extends Controller
{
    public function hitungKomisi()
    {
        $marketings = Marketing::all();
        $result = [];

        foreach ($marketings as $marketing) {
            $penjualanMei = Penjualan::where('marketing_id', $marketing->id)
                ->whereBetween('date', ['2023-05-01', '2023-05-31'])
                ->sum('grand_total');

            $penjualanJuni = Penjualan::where('marketing_id', $marketing->id)
                ->whereBetween('date', ['2023-06-01', '2023-06-30'])
                ->sum('grand_total');

            $result[] = [
                'marketing' => $marketing->name,
                'bulan' => 'Mei',
                'omzet' => $penjualanMei,
                'komisi_persen' => $this->hitungPersenKomisi($penjualanMei),
                'komisi_nominal' => $this->hitungNominalKomisi($penjualanMei),
            ];

            $result[] = [
                'marketing' => $marketing->name,
                'bulan' => 'Juni',
                'omzet' => $penjualanJuni,
                'komisi_persen' => $this->hitungPersenKomisi($penjualanJuni),
                'komisi_nominal' => $this->hitungNominalKomisi($penjualanJuni),
            ];
        }

        return response()->json($result);
    }

    private function hitungPersenKomisi($omzet)
    {
        if ($omzet >= 500000000) return 10;
        if ($omzet >= 200000000) return 5;
        if ($omzet >= 100000000) return 2.5;
        return 0;
    }

    private function hitungNominalKomisi($omzet)
    {
        return $omzet * ($this->hitungPersenKomisi($omzet) / 100);
    }
}
