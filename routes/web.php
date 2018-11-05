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

Auth::routes();
Route::get('/test', function () {
    echo phpinfo();
});

Route::get('/notUser', function () {
    return view('notUser');
})->name('notUser');

//role returned /notuser if u are not logged in or not the right user
Route::middleware(['role:1', 'auth'])->group(function () {
});
Route::middleware(['role:2', 'auth'])->group(function () {
    Route::resource('/', 'dashboardController');
    Route::resource('/dashboard', 'dashboardController');
    route::resource('/registering', 'RegistrationController');

    route::get('registering/payed/{id}', 'RegistrationController@payed');
    route::get('registering/reset/{id}', 'RegistrationController@reset');
    route::get('registering/payedAndInside/{id}', 'RegistrationController@payedAndInside');
    route::get('registering/speciale/{id}', 'RegistrationController@special');
    route::get('registering/inside/{id}', 'RegistrationController@inside');
    route::resource('statistic', 'statisticController');
    route::resource('student', 'StudentController');
    route::get('payedNinside', 'HomeController@payedninside');
    route::get('payed', 'HomeController@payed');
    route::get('inside', 'HomeController@inside');
});

Route::middleware(['role:3', 'auth'])->group(function () {
    route::get('party/archived', 'partyController@indexArchive')->name("party.indexArchive");
    route::get('party/active/{id}', 'partyController@active')->name("party.active");
    route::get('party/archive/{id}', 'partyController@archive')->name("party.archive");
    route::get('party/dearchive/{id}', 'partyController@dearchive')->name("party.dearchive");
    route::resource('party', 'partyController');
    route::post('student/storePhotoYear', 'StudentController@storePhotoYear')->name("studentStoreYear");
    route::post('student/storePhoto', 'StudentController@storePhoto')->name("studentStore");
    route::resource('user', 'userController');

});
