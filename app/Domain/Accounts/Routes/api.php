<?php

use App\Domain\Accounts\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('{user}')->name('.user')->group(function () {
    Route::get('', Controllers\UserShowController::class)->name('.show');
});
