<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@index');

//----------------CLIENTS--------------------//
Route::get('/logout',function () {
    Auth::logout();
    return redirect('/');
});
Route::get('/clients', 'ClientsController@index')->middleware('auth');
Route::get('/clients/formAddClient', 'ClientsController@formAddClient')->middleware('auth');
Route::get('/clients/addClient', 'ClientsController@addClient')->middleware('auth');
Route::get('/clients/getClientsJson', 'ClientsController@getClientsJson')->middleware('auth');
Route::get('/clients/view/{id}','ClientsController@getClient')->middleware('auth');
Route::get('/clients/edit/{id}','ClientsController@editClient')->middleware('auth');
Route::get('/clients/saveClient','ClientsController@saveClient')->middleware('auth');
Route::get('/clients/delete/{id}','ClientsController@deleteClient')->middleware('auth');
Route::get('/clients/addNote/{client_id}','ClientsController@formAddNote')->middleware('auth');
Route::get('/clients/addNote','ClientsController@addNote')->middleware('auth');
Route::get('/clients/deleteNote/{note_id}','ClientsController@deleteNote')->middleware('auth');
Route::get('/clients/editNote/{note_id}','ClientsController@editNote')->middleware('auth');

//---------------ORDERS--------------------//
Route::get('/orders', 'OrdersController@index');
Route::get('/orders/formAddOrder/{client_id}', 'OrdersController@formAddOrder');
Route::get('/orders/formAddOrder', 'OrdersController@formAddOrder');
Route::get('/orders/addOrder','OrdersController@addOrder');
Route::get('/orders/edit/{id}','OrdersController@saveOrder');
Route::get('/orders/delete/{id}','OrdersController@deleteOrder');
Route::get('/orders/view/{id}','OrdersController@getOrder');
Route::get('/orders/getOrdersJson','OrdersController@getOrdersJson');

//----------------MONTERS-----------------//

Route::get('/monters','MontersController@index');
Route::get('/add','MontersController@viewAdd');
Route::post('/add','MontersController@add');

//---------------ADMINS---------------------//
Route::get('/admins','AdminsController@index')->middleware('auth');
Route::get('/admins/vat','AdminsController@getVat')->middleware('auth');
Route::get('/admins/currency','AdminsController@getCurrency')->middleware('auth');
Route::get('/admins/statuses','AdminsController@getStatuses')->middleware('auth');
Route::get('/admins/users','AdminsController@getUsers')->middleware('auth');
Route::get('/admins/permisions','AdminsController@getPermisions')->middleware('auth');

Route::get('/admins/vat/addVat','AdminsController@addVat')->middleware('auth');
Route::get('/admins/vat/edit/{id}','AdminsController@editVat')->middleware('auth');
Route::get('/admins/vat/saveVat','AdminsController@saveVat')->middleware('auth');

Route::get('/admins/currency/addCurrency','AdminsController@addCurrency')->middleware('auth');
Route::get('/admins/currency/edit/{id}','AdminsController@editCurrency')->middleware('auth');
Route::get('/admins/currency/saveCurrency','AdminsController@saveCurrency');

Route::get('/admins/statuses/addStatus','AdminsController@addStatus')->middleware('auth');
Route::get('/admins/statuses/edit/{id}','AdminsController@editStatus')->middleware('auth');
Route::get('/admins/statuses/saveStatus','AdminsController@saveStatus')->middleware('auth');


Route::get('/admins/permisions/addPermision','AdminsController@addPermision')->middleware('auth');
Route::get('/admins/permisions/edit/{id}','AdminsController@editPermision')->middleware('auth');
Route::get('/admins/permisions/savePermision','AdminsController@savePermision')->middleware('auth');

Route::get('/admins/users/addUser','AdminsController@addUser')->middleware('auth');
Route::get('/admins/users/edit/{id}','AdminsController@editUser')->middleware('auth');
Route::get('/admins/users/saveUser','AdminsController@saveUser')->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
