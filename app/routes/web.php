<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Route::prefix('user')->group(function () {
    Route::get('login', 'UserController@show_login')->name('home');
    Route::post('login', 'UserController@login')->name('login');
    Route::get('logout', 'UserController@logout')->name('logout');
});

// Route::middleware('auth')->group(function () {
Route::prefix('user')->group(function () {
    Route::get('dashboard', 'UserController@index')->name('dashboardPage');
});

Route::prefix('user/franchise')->group(function () {
    Route::get('/{franchise}/arenas/all', 'FranchiseController@franchiseArenas')->name('franchiseArenasPage');
    Route::get('/all', 'FranchiseController@index')->name('franchisesPage');
    Route::get('/create', 'FranchiseController@create')->name('createFranchisePage');
    Route::post('/save', 'FranchiseController@store')->name('saveFranchisePage');
    Route::get('/edit/{franchise}', 'FranchiseController@edit')->name('editFranchisePage');
    Route::put('/update/{franchise}', 'FranchiseController@update')->name('updateFranchisePage');

    Route::get('/logo/{filename}', 'FranchiseController@fetchLogoImage')->name('logo_image');
    Route::get('/logo/thumbnail_big/{filename}', 'FranchiseController@fetchLogoImageThumbnailBig')->name('logo_thumbnail_big');
    Route::get('/logo/thumbnail_small/{filename}', 'FranchiseController@fetchLogoImageThumbnailSmall')->name('logo_thumbnail_small');
});

Route::prefix('user/franchise/{franchise}/arena')->group(function () {
    Route::get('/create', 'ArenaController@create')->name('createArenaPage');
    Route::post('/save', 'ArenaController@store')->name('saveArenaPage');
    Route::get('/edit/{arena}', 'ArenaController@edit')->name('editArenaPage');
    Route::put('/update/{arena}', 'ArenaController@update')->name('updateArenaPage');
});

// });
