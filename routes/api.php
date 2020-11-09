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

Route::resource('/adresse', 'AdresseController');
Route::resource('/frequence', 'FrequenceController');
Route::resource('/mode_paiement', 'ModePaieController');
Route::resource('/service_evacuation', 'ServiceEvController');
Route::resource('/fonction', 'FonctionController');
Route::resource('/personne', 'PersonneController');
Route::post('/agent', 'PersonneController@AddAgent');

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth'

    ],
    function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('user-profile', 'AuthController@userProfile');
    }
);
