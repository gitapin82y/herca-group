<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\PembayaranController;

Route::get('/komisi', [KomisiController::class, 'index']);
Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::post('/pembayaran', [PembayaranController::class, 'store']);


