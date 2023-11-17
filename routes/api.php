<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\BookingController;
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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'ruangan'
], function ($router) {
    Route::get('/all', [RuangController::class, 'index']);
    Route::get('/{ruangan}/show', [RuangController::class, 'edit']);    
    Route::post('/create', [RuangController::class, 'create']);
    Route::post('/{ruangan}/update', [RuangController::class, 'update']); 
    Route::delete('/{id}/delete', [RuangController::class, 'delete']);   
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'booking'
], function ($router) {
    Route::get('/all', [BookingController::class, 'index']);
    Route::get('/{booking}/show', [BookingController::class, 'edit']);    
    Route::post('/create', [BookingController::class, 'create']);
    Route::post('/{booking}/update', [BookingController::class, 'update']); 
    Route::delete('/{id}/delete', [BookingController::class, 'delete']);   
});