<?php

// use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user'], function () {
    Route::post('search-token', 'UserController@searchToken');
    Route::post('valid-session', 'UserController@validSession');
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');
    Route::post('search-email', 'ForgotPasswordController@searchEmail');
    Route::post('change-password', 'ForgotPasswordController@resetPassword');
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'tasks-project'], function () {
        Route::get('show-tasks-project', 'TaskController@show');
        Route::post('add-task', 'TaskController@create');
        Route::post('delete-task', 'TaskController@delete');
        Route::post('update-task', 'TaskController@update');
        Route::post('update-task-current', 'TaskController@updateCurrentTask');
    });
    Route::group(['prefix' => 'project'], function () {
        Route::get('show-projects', 'ProjectController@list');
        Route::post('create-project', 'ProjectController@create');
        Route::post('delete-project', 'ProjectController@delete');
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('logout', 'LoginController@Logout');
    });
});
