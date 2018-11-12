<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function(){
    return redirect('login');
});

Route::get('/notUser', function () {
    return view('notUser');
})->name('notUser');

//role returned /notuser if u are not logged in or not the right user
Route::middleware(['role:1', 'auth'])->group(function () {
});
Route::middleware(['role:2', 'auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/dashboard/{status}', 'DashboardController@show');
    route::resource('/registering', 'RegistrationController');
    route::get('/registering/find/{search}', 'RegistrationController@find');
    route::get('/registering/get/{id}', 'RegistrationController@edit');

    route::get('registering/payed/{id}', 'RegistrationController@payed');
    route::get('registering/reset/{id}', 'RegistrationController@reset');
    route::get('registering/payedAndInside/{id}', 'RegistrationController@payedAndInside');
    route::get('registering/speciale/{id}', 'RegistrationController@special');
    route::get('registering/inside/{id}', 'RegistrationController@inside');
    route::resource('statistic', 'StatisticController');
    route::resource('student', 'StudentController');
});

Route::middleware(['role:3', 'auth'])->group(function () {
    route::get('party/archived', 'PartyController@indexArchive')->name('party.indexArchive');
    route::get('party/active/{id}', 'PartyController@active')->name('party.active');
    route::get('party/archive/{id}', 'PartyController@archive')->name('party.archive');
    route::get('party/dearchive/{id}', 'PartyController@dearchive')->name('party.dearchive');
    route::resource('party', 'PartyController');
    route::post('student/storePhotoYear', 'StudentController@storePhotoYear')->name('studentStoreYear');
    route::post('student/storePhoto', 'StudentController@storePhoto')->name('studentStore');
    route::resource('user', 'UserController');
});
