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

Route::get('/', 'ExportController@index');
Route::get('/export/{type}', 'ExportController@export');

Route::get('/pages/addItem', 'pagesController@item')->name('addItem');
Route::get('/pages/editRecord', 'pagesController@edit')->name('editRecord');
Route::get('/pages/displaySales', 'pagesController@dSales')->name('displaySales');
Route::get('/pages/addInventory', 'pagesController@addInventory')->name('addInventory');
Route::get('/pages/displayInventory', 'pagesController@displayInventory')->name('displayInventory');
Route::get('/pages/editSales', 'pagesController@editSales')->name('editSales');

Route::resource('pages', 'pagesController');

Route::resource('Sales', 'SalesController');

Route::resource('inventories', 'InventoriesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('items', 'ExportController@index');
Route::get('items/export', 'ExportController@export');

Route::post('retrieveInv', 'InventoriesController@retrieveInv');
Route::post('retrieveSales', 'SalesController@retrieveSales');
Route::delete('deleteSales/{id}', 'SalesController@deleteSales');
Route::delete('deleteInventory/{id}', 'InventoriesController@deleteInventory');
