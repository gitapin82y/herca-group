<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\Penjualan;
use Exception;

class KomisiController extends Controller
{
    public function index()
    {
        try {
            $komisi_data = [];

            $marketings = Marketing::all();
            foreach ($marketings as $marketing) {
                $omzet_per_bulan = Penjualan::selectRaw('MONTH(date) as bulan, SUM(grand_total) as omzet')
                ->where('marketing_id', $marketing->id)
                ->groupByRaw('YEAR(date), MONTH(date)')
                ->orderByRaw('YEAR(date) ASC, MONTH(date) ASC')
                ->get();


                foreach ($omzet_per_bulan as $omzet) {
                    $komisi_persen = 0;
                    if ($omzet->omzet >= 500000000) {
                        $komisi_persen = 10;
                    } elseif ($omzet->omzet >= 200000000) {
                        $komisi_persen = 5;
                    } elseif ($omzet->omzet >= 100000000) {
                        $komisi_persen = 2.5;
                    }

                    $komisi_nominal = ($komisi_persen / 100) * $omzet->omzet;

                    $komisi_data[] = [
                        'marketing' => $marketing->name,
                        'bulan' => $omzet->bulan,
                        'omzet' => $omzet->omzet,
                        'komisi_persen' => $komisi_persen,
                        'komisi_nominal' => $komisi_nominal
                    ];
                }
            }

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data retrieved successfully',
                'data' => $komisi_data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Something went wrong',
                'data' => null
            ], 500);
        }
    }
}
