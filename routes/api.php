<?php
use App\Http\Controllers\KomisiController;

Route::get('/komisi', [KomisiController::class, 'hitungKomisi']);