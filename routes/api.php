<?php

use App\Http\Middleware\BackendAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware([BackendAuthentication::class])->group(function() {

});
