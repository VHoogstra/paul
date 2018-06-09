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

Route::get('/notUser', function () {
    return 'not right role';
})->name('notUser');

//role returned /notuser if u are not logged in or not the right user
Route::middleware(['role:user','auth'])->group(function () {

    Route::resource('/', 'dashboardController');
    Route::resource('/dashboard', 'dashboardController');
    route::resource('/registering', 'RegistrationController');

//    route::get('signIn/payed/{id}', 'sign_inController@payed');
//    route::get('signIn/payedAndInside/{id}', 'sign_inController@payedAndInside');
//    route::get('signIn/speciale/{id}', 'sign_inController@speciale');
//    route::get('signIn/inside/{id}', 'sign_inController@inside');

    route::resource('statistic', 'statisticController');

    route::get('party/archived', 'partyController@indexArchive')->name("party.indexArchive");
    route::get('party/active/{id}', 'partyController@active')->name("party.active");
    route::get('party/archive/{id}', 'partyController@archive')->name("party.archive");
    route::get('party/dearchive/{id}', 'partyController@dearchive')->name("party.dearchive");
    route::resource('party', 'partyController');

    route::post('student/storePhotoYear', 'StudentController@storePhotoYear')->name("studentStoreYear");
    route::post('student/storePhoto', 'StudentController@storePhoto')->name("studentStore");
    route::resource('student', 'StudentController');
    route::resource('user', 'userController');

//
//    route::get('progress', 'studentController@progress');
//    route::get('student/updateList', 'studentController@updateList');
//    route::get('student/updatePhoto', 'studentController@updatePhoto');
//
//    route::post('student/storePhoto', 'studentController@storePhoto');
//    route::post('student/storePhotoYear', 'studentController@storePhotoYear');
//
//    route::get('party/archive', 'partyController@archive');
//
//    route::get('party/{id}/remove', 'partyController@destroy');
//    route::get('party/{id}/active', 'partyController@active');
//    route::get('party/{id}/archive', 'partyController@setArchive');
//    route::get('party/{id}/dearchive', 'partyController@deArchive');



});