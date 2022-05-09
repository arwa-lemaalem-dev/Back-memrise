<?php

// use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('search-token','UserController@searchToken');
Route::group(['prefix' => 'auth'], function () {
    Route::post('register','RegisterController@register');
    Route::post('login','LoginController@login');
    Route::post('search-email','ForgotPasswordController@searchEmail');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('logout','LoginController@Logout');
    });
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'project'], function () {
        Route::post('create-project','ProjectController@create');
    });
});


