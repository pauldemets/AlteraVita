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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/add', 'AnnonceController@add')->middleware('auth');
Route::post('/add', 'AnnonceController@send')->name('addAnnonce');
Route::post('/delete/{id}', 'AnnonceController@delete')->name('deleteAd');
Route::get('/propositions/{id}', 'AnnonceController@showPropositions')->name('propositionsReparation');
Route::post('/validateProposition/{id}', 'AnnonceController@validateProposition')->name('validateProposition');


Route::get('/annonces', 'AnnonceController@showList')->name('showAnnonces');
Route::get('/annonces/{id}', 'AnnonceController@show')->name('annonceDetails');
Route::get('/annonce/{type}','AnnonceController@changeTab');
Route::post('/annonce/repair/{id}','AnnonceController@repair')->name('repairAnnonce')->middleware('auth');

Route::get('/filter','AnnonceController@filterAnnonces');
Route::get('/annonce','AnnonceController@search')->name('search');

Route::get('/about', 'InformationController@about')->name('about');
Route::get('/faq', 'InformationController@faq')->name('faq');
Route::get('/legal', 'InformationController@legal')->name('legal');
Route::get('/contact','InformationController@contact')->name('contact');
Route::post('/contact','InformationController@sendMessage')->name('sendMessage');

Route::get('/user/{id}', 'UserController@show')->name('userDetails');
Route::get('/userProfile', 'UserController@showUserProfile')->name('userProfile');
Route::get('/editUser', 'UserController@editUser')->middleware('auth');
Route::post('/editUser', 'UserController@send')->name('editUser');

Route::get('/test', 'AnnonceController@showList2');

