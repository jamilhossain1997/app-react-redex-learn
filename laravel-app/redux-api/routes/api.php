<?php
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



// auth
Route::prefix('auth')->group(function () {
    Route::post('UserRegister', 'App\Http\Controllers\Auth\RegisterController@UserRegister');
    Route::post('UserLogin', 'App\Http\Controllers\Auth\LoginController@UserLogin');
});


//user 
Route::prefix('user')->middleware('auth:api')->group(function () {
    Route::get('UserView', 'App\Http\Controllers\Auth\userViewController@UserView');
    Route::put('UserUpdate/{id}', 'App\Http\Controllers\Auth\userEditcontroller@UserUpdate');
    Route::delete('UserDelect/{id}', 'App\Http\Controllers\Auth\userEditcontroller@UserDelect');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
