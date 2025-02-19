<?php

use Illuminate\Support\Facades\Route;
use YourVendor\PreOrderAddon\Http\Controllers\PreOrderController;

Route::prefix('api/preorder')->group(function () {
    Route::post('/create', [PreOrderController::class, 'create']);
    Route::post('/convert/{id}', [PreOrderController::class, 'convert']);
});
