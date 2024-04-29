<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function () {
    return view('wellcome');
});


Route::post("/post/create", [PostController::class, 'create']);
Route::put("/post/update/{id}", [PostController::class, 'update']);
Route::delete("/post/delete/{id}", [PostController::class, 'delete']);


Route::middleware(['web', 'throttle:60,1'])->group(function () {
    Route::get("/post/all", [AuthManager::class, 'select']);
});
