<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use Exception;

class PembayaranController extends Controller
{
    public function index()
    {
        try {
            $pembayaran = Pembayaran::all();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data retrieved successfully',
                'data' => $pembayaran
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Something went wrong :'.$e,
                'data' => null
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $pembayaran = Pembayaran::create([
                'penjualan_id' => $request->penjualan_id,
                'jumlah_bayar' => $request->jumlah_bayar,
                'tanggal_bayar' => $request->tanggal_bayar
            ]);

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'message' => 'Payment created successfully',
                'data' => $pembayaran
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Something went wrong : '.$e,
                'data' => null
            ], 500);
        }
    }
}
