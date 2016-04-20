<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Status;
use App\Ticket;
use PDF;
use Auth;

class TicketController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$tickets = Ticket::all();

    	return view('tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
    	$ticket->load('customer', 'status');
    	return view('tickets.show', compact('ticket'));
    }

    public function create() 
    {
    	return view('tickets.create');
    }

    public function createForCustomer(Customer $customer)
    {
    	return view('tickets.create', compact('customer'));
    }

    public function store(Request $request) 
    {
    	$this->validate($request, [
    		// 'name' => 'required|unique:customers,name,NULL,id,contact_phone,'.$request->contact_phone,
    		'name' => 'required',
    		'contact_phone' => 'required'
    	]);

		$customerId = $request->customer_id;
		$ticket = new Ticket;
		$price = ($request->price != '') ? preg_replace('/[^0-9]/', '', $request->price) : null;

    	$ticket->unlock_code = $request->unlock_code;
		$ticket->device_phone_number = $request->device_phone_number;
		$ticket->description = $request->description;
		$ticket->status_id = 1;
		$ticket->price = $price;
		$ticket->user_id = Auth::user()->id;

		if($customerId == null) {
			$customer = Customer::create($request->all());
			$customer->tickets()->save($ticket);
		} else {
			$customer = Customer::find($customerId);
			$customer->update($request->all());
			$ticket->customer_id = $customerId;
			$ticket->save();
		}

		return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
    	$ticket->load('customer', 'status');
    	$customer = $ticket->customer;
    	$statuses = Status::all()->lists('name', 'id');
    	return view('tickets.edit', compact('ticket', 'customer', 'statuses'));
    }

    public function update(Request $request, Ticket $ticket)
    {
    	$ticket->customer->update($request->all());
    	$ticket->update($request->except('price'));
    	if($request->price != '') {
			$price = preg_replace('/[^0-9]/', '', $request->price);
    		$ticket->update(array('price' => $price));
    	}
    	return redirect('tickets')->with('message', 'Ticket updated.');
    }

    public function destroy(Ticket $ticket)
    {
    	$ticket->delete();
    	return redirect('tickets')->with('message', 'Ticket deleted.');
    }

    public function printTicket(Ticket $ticket)
    {
        // $pdf = App::make('snappy.pdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->inline();

        $pdf = PDF::loadView('layouts.invoice', compact('ticket'));
        return $pdf->inline();

        // return view('layouts.invoice', compact('ticket'));

    }
}
