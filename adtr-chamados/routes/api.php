<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChamadoApiController;

Route::apiResource('chamados', ChamadoApiController::class)
    ->names('api.chamados');
