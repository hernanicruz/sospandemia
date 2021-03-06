<?php

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

Route::middleware('auth:api')->group(function() {

    // auth routes
    Route::post('logout', 'AuthController@logout');

    // profile routes
    Route::get('profile', 'ProfileController@info');

    // entities routes
    Route::get('entities/{entity}/demands', 'EntitiesController@indexDemands');
    Route::post('entities/{entity}/new-demand', 'EntitiesController@createDemand')->middleware('can:createDemand,entity');

    // demands routes
    Route::get('demands', 'DemandsController@index');
    Route::get('demands/{demand}', 'DemandsController@info');
    Route::put('demands/{demand}', 'DemandsController@update')->middleware('can:update,demand');
    Route::delete('demands/{demand}', 'DemandsController@delete')->middleware('can:delete,demand');

});
