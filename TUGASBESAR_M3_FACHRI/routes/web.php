<?php

use App\Http\Controllers\PenghuniController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('penghuni.index'));

Route::resource('penghuni', PenghuniController::class)->except('show');
