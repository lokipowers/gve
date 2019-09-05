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

Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	// CharacterController
    Route::get('characters', "CharacterController@index")->name('character.viewAll');
    Route::get('character', "CharacterController@viewOwn")->name('character.viewOwn');
    Route::get('character/create', "CharacterController@create")->name('character.create');
    Route::post('character/create', "CharacterController@store")->name('character.store');
    Route::get('character/{id}', "CharacterController@view")->name('character.view');
    Route::get('character/{id}/edit', "CharacterController@edit")->name('character.edit');
    Route::put('character/{id}/edit', "CharacterController@update")->name('character.update');

    // Equipment
    Route::get('equipment', "EquipmentController@indexInventory")->name('equipment.inventory');
    Route::get('equipment/buy', "EquipmentController@indexMarketplace")->name('equipment.marketplace');
    Route::get('equipment/buy/{type}/{id}', "EquipmentController@viewMarketplace")->name('equipment.purchase');
    Route::post('equipment/buy/{type}/{id}', "EquipmentController@purchaseItem")->name('equipment.purchase_item');
    Route::get('equipment/{slug}', "EquipmentController@viewInventory")->name('equipment.inventory.item');

    // Travel
    Route::get('travel', "TravelController@index")->name('travel');
    Route::post('trave', "TravelController@travel")->name('travelTo');

    // Activities
    Route::get('activities', "ActivityController@index")->name('activities.index');
    Route::get('activities/{id}', "ActivityController@doActivity")->name('activities.do');

    // Properties
    Route::get('properties', "PropertyController@index")->name('properties.index');
    Route::get('properties/{slug}', "PropertyController@view")->name('properties.view');
    Route::post('properties/{slug}/buy')->name('properties.purchase');


    // Messages
    Route::get('messages', "MessageController@index")->name('messages.index');
    Route::get('messages/chat/{username}', "MessageController@chat")->name('messages.chat');
    Route::post('messages/chat/{username}', "MessageController@send")->name('messages.send');
    Route::delete('messages/chat{username}', "MessageController@deleteChat")->name('message.delete.chat');
    Route::delete('messages/message/{id}', "MessageController@deleteMessage")->name('message.delete.message');

    // Notifications
    Route::get('notifications', "NotificationController@index")->name('notifications');
    Route::get('notifications/{id}', "Notifications@view")->name('notifications.view');
    Route::post('notifications/{id}/read', "Notifications@markRead")->name('notifications.read');


    // Puzzles
    //Route::get('puzzles/wordsearch', "PuzzleController@wordSearch")->name('puzzle.wordsearch');
    Route::get('puzzles/wordsearch/{difficulty}', "Puzzles\\WordSearchController@wordSearch")->name('puzzle.wordsearch.difficulty');

});

