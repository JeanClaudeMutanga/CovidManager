<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','auth.login');
//--- aAdmin Routes-----------
Route::get('/facilities/all','AdminController@facilities');

Route::post('/facilities/add','AdminController@store');

Route::get('/admin/users','AdminController@users');

Route::get('/quarantine/{id}','AdminController@quarantine');

Route::post('/quarantine/add/{id}','AdminController@people');

//--- aAdmin Routes-----------

//-----Quarantine Facility Routes

Route::get('/admissions/all','QuarantineController@index');

Route::get('/admissions/create','QuarantineController@create');

Route::post('/isolate','QuarantineController@store');

Route::get('/recoveries','QuarantineController@recoveries');

Route::get('/recoveries/create','QuarantineController@publish');

Route::get('/recoveries/filter','QuarantineController@search');

Route::get('/mark/{id}','QuarantineController@mark');

Route::post('/clear','QuarantineController@clear');

Route::get('/deaths','QuarantineController@deaths');

Route::get('/death/create','QuarantineController@sad');

Route::get('/deaths/filter','QuarantineController@filter');

Route::get('/deaths/add/{id}','QuarantineController@kill');

Route::post('/deaths/record','QuarantineController@save');


//-----More Quarantine

Route::get('/stock','QuarantineController@stock');

Route::get('/ppes/tracking','QuarantineController@ppes');



Route::get('/main/screened','QuarantineController@screened');

Route::get('/get/screened','QuarantineController@filtered');

Route::get('/confirm/admission/{id}','QuarantineController@confirm');

Route::get('/beds','OccupationController@index');

Route::get('/allocated/beds','OccupationController@beds');



Route::get('/total/beds','OccupationController@bedding');

Route::get('/give/bed','OccupationController@service');

Route::get('/patient/{id}','OccupationController@profile');

Route::post('/patient/bed/{id}','OccupationController@admit');

Route::get('/bedding/filter','OccupationController@search');

Route::post('/create/bed','OccupationController@new_bed');

Route::get('/capacity/open','OccupationController@capacity');

Route::get('/output/filter','OccupationController@filter');

Route::post('/refer/patient/{id}','OccupationController@refer');


Route::get('/incoming/referrals','OccupationController@incoming');

Route::get('/outgoing/referrals','OccupationController@outgoing');

Route::post('/discharge/patient/{id}','OccupationController@discharge');


//-----Quarantine Facility Routes

Route::post('/autocomplete/fetch', 'DistrictController@fetch')->name('autocomplete.fetch');

Route::post('/super/super', 'DistrictController@super')->name('super.super');

Route::get('/district/open/{id}','DistrictController@index')->name('district');

Route::get('/district/screened/{id}','DistrictController@screened')->name('districtscreened');

Route::get('/district/refereed/{id}','DistrictController@refereed')->name('districtrefereed');

Route::get('/district/pending/{id}','DistrictController@pending')->name('districtpending');

Route::get('/district/positive/{id}','DistrictController@positive')->name('districtpositive');

Route::get('/district/negative/{id}','DistrictController@negative')->name('districtnegative');

Route::get('/cases','PatientsController@all');

Route::get('/dashboard','PatientsController@main');

Route::get('/contact/{id}','PatientsController@contact')->name('contact');

Route::get('/case/open/{id}','PatientsController@single')->name('profile');

Route::post('/contact/add/{id}','ContactsController@store');

Route::get('/doctor/{id}','DeathsController@show');

Route::post('/addcase','PatientsController@save');

Route::get('/search','PatientsController@search');

Route::get('/filter','PatientsController@filter');



Route::get('/refereed/all','LabController@index');

Route::get('/refereed/open/{id}','LabController@show');

Route::post('/refereed/update/{id}','LabController@update');

Route::get('/lab/search','LabController@search');


Route::get('/custom','DeathsController@search');

Route::get('/firebase','FirebaseController@index');

Route::get('/read','FirebaseController@index');

//----Screening Routes
Route::get('/screening','PatientsController@test');

Route::get('/tested','PatientsController@tested');

Route::post('/test','PatientsController@screen');

Route::get('/negative/{id}','PatientsController@negative')->name('patients');

Route::get('/positive/{id}','PatientsController@positive')->name('patients');



Route::post('/insert', 'PatientsController@insert');


Route::get('/tracking','PatientsController@track');

Route::get('/item','PatientsController@trace');

Route::get('/well/{id}','PatientsController@well')->name('tracking');

Route::get('/not/{id}','PatientsController@not')->name('tracking');

Route::get('/monitoring','PatientsController@monitoring');

Route::get('/municipalities','MunicipalitiesController@index');

Route::get('/limpopo','MunicipalitiesController@province');

Route::get('/plus','PatientsController@create');



//----Screening Routes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
