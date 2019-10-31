<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentation', function () {
    return view('documentation');
});

Route::get('/settings', function () {

    return view('settings');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/event', function () {
    event(new App\Events\Test('test'));
    return "Event has been sent!";
});

Route::get('/keys', 'KeyController@index');

Route::get('/keys/create', 'KeyController@create');




Route::get('/messages', 'MessageController@index');

Route::post('/messages', 'MessageController@store');

Route::post('/messages/filter', 'MessageController@filter');

Route::get('/messages/create', 'MessageController@create');

Route::get('/messages/create/{id}', 'MessageController@create');

Route::get('/messages/{pubkey}', 'MessageController@showPubKey');

Route::get('/messages/message/{message}', 'MessageController@show');


Route::get('/friends/add/{friend}', 'FriendController@store');

Route::get('/friends/decline/{friend}', 'FriendController@decline');






Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
