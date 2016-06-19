@extends('layouts.master')

@section('title', 'Ticket')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-xs-6">
            <h3><span class="label label-{{ $ticket->status->color }}">{{ $ticket->status->name }}</span> {{ $ticket->id }} <span class="small pull-right"></span></h3>
        </div>
        <div class="col-xs-6">
            <a href="{{ URL::route('ticket.edit', $ticket->id) }}" class="pull-right"><button type="button" class="btn btn-warning btn-md"><i class="fa fa-pencil"></i> Edit Ticket</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
			    <div class="panel-heading">
			        <h3 class="panel-title">Customer Information</h3>
			    </div>
			    <div class="panel-body">
			        <div class="row">
			            <div class="col-sm-12">
			                <h4>Name</h4>
			                <p>{{ $ticket->customer->name }}</p>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-sm-6">
			                <h4>City</h4>
			                <p>{{ $ticket->customer->city }}</p>
			            </div>
			            <div class="col-sm-6">
			                <h4>Zip</h4>
			                <p>{{ $ticket->customer->zip }}</p>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-sm-6">
			                <h4>Contact Number</h4>
			                <p>{{ $ticket->customer->contact_phone }}</p>
			            </div>
			            <div class="col-sm-6">
			                <h4>Other Contact</h4>
			                <p>{{ $ticket->customer->email }}</p>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Device Information</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Device Phone Number</h4>
                            <p>{{ $ticket->device_phone_number }}</p>
                        </div>
                        <div class="col-sm-6">
                            <h4>Device Unlock Code</h4>
                            <p>{{ $ticket->device_unlock_code }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Work Description</h4>
                            <p>{{ $ticket->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Price</h4>
                            <p>${{ $ticket->price/100 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop