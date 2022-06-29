<?php
use App\Http\Controllers\MetricController;
use App\Http\Middleware\BackendAuthentication;
use App\Http\Middleware\TrustHosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(MetricController::class)->group(function() {

    Route::post('/', 'store')->middleware(TrustHosts::class);

    Route::middleware(BackendAuthentication::class)->group(function() {

    });

});
