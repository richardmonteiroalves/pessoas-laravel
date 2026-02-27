<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;

Route::name('api.')->apiResource('people', PersonController::class);
