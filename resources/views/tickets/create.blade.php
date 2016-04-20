@extends('layouts.master')

@section('title', 'Create New Ticket')

@section('newticket.class', 'active')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
    <h3>New Ticket</h3>
    {{  Form::open(array('route' => 'ticket.store', 'class' => 'form')) }}
    @if(isset($customer))
        {{ Form::hidden('customer_id', $customer->id) }}
    @endif
    <div class="row">
        <div class="col-md-6">
            @include('partials.customer_panel')
        </div>
        <div class="col-md-6">
            @include('partials.ticket_panel')
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-block submit_button')) }}
        </div>
        <div class="col-md-4">
            <a href="{{ URL::route('ticket.create') }}"><button type="button" class="btn btn-warning btn-block">Reset</button></a>
        </div>
        <div class="col-md-4">
            <a href="{{ URL::route('dashboard') }}"><button type="button" class="btn btn-danger btn-block">Cancel</button></a>
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop

@section('javascript')
$(document).ready(function(){
    $("input[name*='_phone']").keyup(function() {
        var curchr = this.value.length;
        var curval = $(this).val();
        if (curchr == 3) {
            $(this).val("(" + curval + ")" + "-");
        } else if (curchr == 9) {
            $(this).val(curval + "-");
        }
    });
});
@endsection