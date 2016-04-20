<?php


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'PagesController@dashboard'));
    Route::get('/tickets/new', array('as' => 'tickets.new', 'uses' => 'PagesController@newTickets'));

    Route::get('/tickets', array('as' => 'tickets.index', 'uses' => 'TicketController@index'));
	Route::resource('ticket', 'TicketController', ['except' => ['index']]);
	Route::get('/ticket/customer/{customer}', array('as'=> 'ticket.createForCustomer', 'uses' => 'TicketController@createForCustomer'));
	Route::get('/ticket/{ticket}/print', array('as'=> 'ticket.print', 'uses' => 'TicketController@printTicket'));

	Route::get('/customers', array('as' => 'customers.index', 'uses' => 'CustomerController@index'));
	Route::resource('customer', 'CustomerController', ['except' => ['index']]);
});