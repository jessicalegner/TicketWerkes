@extends('layouts.master')

@section('title', 'Customer')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>{{ $customer->name }}</h3>
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
			    <div class="panel-heading">
			        <h3 class="panel-title">Customer Information</h3>
			    </div>
			    <div class="panel-body">
			        <div class="row">
			            <div class="col-sm-12">
			                <h4>Name</h4>
			                <p>{{ $customer->name }}</p>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-sm-6">
			                <h4>City</h4>
			                <p>{{ $customer->city }}</p>
			            </div>
			            <div class="col-sm-6">
			                <h4>Zip</h4>
			                <p>{{ $customer->zip }}</p>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-sm-6">
			                <h4>Contact Number</h4>
			                <p>{{ $customer->contact_phone }}</p>
			            </div>
			            <div class="col-sm-6">
			                <h4>Other Contact</h4>
			                <p>{{ $customer->email }}</p>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Tickets</div>
				<div class="panel-body">
			  		@if(count($customer->tickets) > 0)
			  		<!-- Table -->
			  		<table class="table">
			  			<thead>
		                    <tr>
		                        <th>Ticket No.</th>
		                        <th>Status</th>
		                        <th>Description</th>
		                        <th>Updated</th>
		                    </tr>
		                </thead>
		                <tbody>
		                @foreach($customer->tickets as $ticket)
		                <tr>
		                    <td><a href="{{ URL::route('ticket.show', $ticket->id) }}">{{ $ticket->id }}</a></td>
		                    <td><span class="label label-{{ $ticket->status->color }}">{{ $ticket->status->name }}</span></td>
		                    <td>{{ $ticket->description }}</td>
		                    <td>{{ $ticket->updated_at->format('m/d/Y') }}</td>
		                </tr>
		                @endforeach
		                </tbody>
		            </table>
		            @else
						<p>No tickets for this customer, but you can create one.
							<a href="{{ URL::route('ticket.createForCustomer', $customer->id) }}" class="pull-right"><button type="button" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Create Ticket</button></a>
						</p>
		            @endif
		        </div>
			</div>
    	</div>
	</div>
</div>
@stop