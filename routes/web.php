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

Route::get('/pages/addItem', 'pagesController@item')->name('addItem');
Route::get('/pages/editRecord', 'pagesController@edit')->name('editRecord');
Route::get('/pages/displaySales', 'pagesController@dSales')->name('displaySales');
Route::get('/pages/addInventory', 'pagesController@addInventory')->name('addInventory');
Route::get('/pages/displayInventory', 'pagesController@displayInventory')->name('displayInventory');

Route::resource('pages', 'pagesController');

Route::resource('Sales', 'SalesController');

// Route::get('inventories', 'InventoriesController@create');
// Route::post('inventories', 'InventoriesController@store');
Route::resource('inventories', 'InventoriesController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
