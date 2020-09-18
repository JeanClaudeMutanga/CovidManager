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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cases', 'PatientsController@index');

Route::post('/cases', 'PatientsController@store');

Route::get('/cases/{patients}','PatientsController@show');


Route::get('/deaths', 'DeathsController@index');

Route::post('/deaths', 'DeathsController@store');

Route::get('/deaths/{deaths}','DeathsController@show');

//----------Mobile App Authorization End Points

Route::post('/login','AuthController@login');

Route::post('/signup','AuthController@signup');

//----------Mobile App Authorization End Points

Route::get('/recoveries', 'RecoveriesController@index');

Route::post('/recoveries', 'RecoveriesController@index');

Route::get('/recoveries/{recoveries}','RecoveriesController@show');

//-----more end points

Route::post('/collisions', 'PointsController@collisions');

Route::post('/ctusers', 'PointsController@ctusers');

//---------OTP Endpoints
Route::get('/otp/new','OTPController@create');

//---------Rapid MAC Addresses Uploads
Route::post('/upload/{id}', 'PointsController@upload');
//---------Rapid MAC Addresses Uploads


