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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/register", "Api\RegistrationController@register");
Route::post("/login", "Api\LoginController@login");
Route::get("/authenticated", "Api\LoginController@valid_token")->middleware('auth:sanctum');
Route::get("/logout", "Api\LoginController@logout")->middleware('auth:sanctum');
