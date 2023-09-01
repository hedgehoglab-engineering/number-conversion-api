<?php

use App\Http\Controllers\HealthCheck;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

/*
|--------------------------------------------------------------------------
| Global Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Global routes for your application.
| These routes are loaded by the RouteServiceProvider outside of any middleware group.
|
*/

Route::get('/healthz', HealthCheck::class);

Route::group([
    'as' => 'passport.',
    'prefix' => config('passport.path', 'oauth'),
], function () {
    Route::post('token', [
        'uses' => [AccessTokenController::class, 'issueToken'],
        'as' => 'token',
        'middleware' => 'throttle',
    ]);
});
