<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Ticket;
use Auth;

class CustomerController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$customers = Customer::all();

    	return view('customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
    	$customer->load('tickets');
    	return view('customers.show', compact('customer'));
    }

    public function create() 
    {
    	return view('customers.create');
    }

    public function store(Request $request) 
    {
    	$this->validate($request, [
    		// 'name' => 'required|unique:customers,name,NULL,id,contact_phone,'.$request->contact_phone,
    		'name' => 'required',
    		'contact_phone' => 'required'
    	]);

		$customer = Customer::create($request->all());
		return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) 
    {
    	return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer) 
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'contact_phone' => 'required'
    	]);

		$customer->update($request->all());
		return view('customers.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
    	$customer->delete();
    	return redirect('customers')->with('message', 'Customer deleted.');
    }
}
