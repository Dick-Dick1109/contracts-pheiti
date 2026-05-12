<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContractController::class, 'index'])->name('contracts.index');
