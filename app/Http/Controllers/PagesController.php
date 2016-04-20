<?php

namespace App\Http\Controllers;

use App\Ticket;

class PagesController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}

  	public function dashboard() 
  	{
    	return view('dashboard');
  	}

  	public function newTickets() 
  	{
  		$tickets = Ticket::where('status_id', 1)->get();
    	return view('tickets.new', compact('tickets'));
  	}
}