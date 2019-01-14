<?php

use \Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

/** Host Routes */
Route::get('/get-my-houses', 'HostController@getMyHouses');
Route::get('/my-houses', 'HostController@myHouses');
Route::get('/my-houses/{house}', 'HostController@houseDetails');
Route::get('/my-houses/{house}/edit', 'HouseController@edit');
Route::get('/my-houses/{house}/delete', 'HouseController@deleteHouse');
Route::get('/my-houses/{house}/cleaners', 'HouseController@getCleanersByHouse');
Route::get('/my-houses/{house}/dismiss-cleaner/{cleaner}', 'HouseController@dismissCleaner');
Route::post('/my-houses/{house}/assign-cleaner','HouseController@assignCleaner');

/** Cleaning Project Routes */
Route::get('/cleaning-projects', 'HostController@listCleaningProjects');
Route::get('/host-cleaning-projects/{cleaningProject}', 'HostController@showCleaningProject');
Route::get('/host-cleaning-projects/{cleaningProject}/delete', 'HostController@deleteCleaningProject');
Route::get('/new-cleaning-project', 'HostController@newCleaningProject');
Route::post('/store-cleaning-project', 'HostController@storeCleaningProject');

/** Manage Cleaners Routes */
Route::get('/my-houses/{house}/manage-cleaners', 'HouseController@manageCleaners');
Route::get('/my-cleaners', 'HostController@myCleaners');
Route::get('/my-cleaners/{cleaner}', 'HostController@cleanerDetails');
Route::get('/cleaner-connection', 'HostController@newCleanerConnection');
Route::post('/cleaner-connection', 'HostController@storeCleanerConnection');
Route::get('/delete-cleaner-connection/{cleaner}', 'HostController@deleteCleanerConnection');
Route::get('/get-my-cleaners', 'HostController@getMyCleaners');

/** House Routes */
Route::get('/new-house', 'HouseController@new');
Route::post('/store-house', 'HouseController@store');
Route::patch('/store-house', 'HouseController@update');

/** Cleaner Routes */
Route::get('/my-cleanings', 'CleanerController@myCleanings');
Route::get('/my-cleanings/{cleaningProject}', 'CleanerController@cleaningDetails');
Route::get('/my-customers', 'CleanerController@myCustomers');
Route::get('/my-customers/{host}', 'CleanerController@customerDetails');
