<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'TemplateController@index');
Route::get('/home', 'TemplateController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('templates', 'TemplateController');
    Route::resource('bunches', 'BunchController');
    Route::resource('campaigns', 'CampaignController');
    Route::get('/campaigns/{campaign}/send', 'CampaignController@send');
    Route::get('/campaigns/{campaign}/preview', 'CampaignController@preview');

    Route::group(['prefix' => 'bunches/{bunch_id}/', 'as' => 'bunches::'], function () {
        Route::resource('subscribers', 'SubscriberController');
    });
});


