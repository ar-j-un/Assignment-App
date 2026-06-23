<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/welcome', function () {
    $data = 'John';

    return response()->json([
        'status' => true,
        'message' => 'Hello',
        'data' => $data,
    ]);
});
