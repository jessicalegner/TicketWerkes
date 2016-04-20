@extends('layouts.master')

@section('title', 'Update Ticket')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Update Ticket: {{ $ticket->id }} </h3>
    <form method="POST" action="{{ URL::route('ticket.update', $ticket->id) }}" class="form">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        {{ Form::hidden('customer_id', $ticket->customer->id) }}
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
                <a href="{{ URL::route('ticket.edit', $ticket->id) }}"><button type="button" class="btn btn-warning btn-block">Reset</button></a>
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

    if($("#price").val() != ''){
        var currentPrice = $("#price").val();
        $("#price").val(currentPrice/100);
    }
});
@endsection