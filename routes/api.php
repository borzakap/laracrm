<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResidentialController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::scopeBindings()->group(function() {
    Route::controller(ContactController::class)->prefix('contacts')->group(function () {
        Route::post('list', 'list');
        Route::post('create', 'create');
        Route::get('{contact}', 'get');
        Route::prefix('{contact}/phones')->group(function () {
            Route::put('{phone}', 'updatePhone');
            Route::post('/', 'createPhone');
            Route::delete('{phone}', 'destroyPhone');
        });
        Route::prefix('{contact}/emails')->group(function () {
            Route::put('{email}', 'updateEmail');
            Route::post('/', 'createEmail');
            Route::delete('{email}', 'destroyEmail');
        });
    });
    Route::controller(ResidentialController::class)->prefix('residentials')->group(function () {
        Route::get('list', 'list');
        Route::post('create', 'create');
        Route::get('{residential}', 'get');
    });
});
