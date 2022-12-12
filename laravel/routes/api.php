<?php

use App\Http\Controllers\AccessLinkController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post(
    '/login',
    [UsersController::class, 'create']
);
Route::group(['middleware' => 'guest'],  function () {
    Route::get(
        '/history/{uuid}',
        [HistoryController::class, 'index']
    );

    Route::post(
        '/game',
        [GameController::class, 'getGame']
    );



    Route::patch(
        '/access-link/{uuid}',
        [AccessLinkController::class, 'update']
    );

    Route::get(
        '/access-link/{uuid}',
        [AccessLinkController::class, 'getAccess']
    );
});

Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {
    Route::get('/users', [UsersController::class, 'index']);
    Route::patch('/user', [UsersController::class, 'update']);
    Route::post(
        '/access-link',
        [AccessLinkController::class, 'create']
    );
});
