@extends('layouts.master')

@section('title', 'Update Customer')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Update Customer: {{ $customer->name }} </h3>
    <form method="POST" action="/customer/{{$customer->id }}" class="form">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                @include('partials.customer_panel')
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-block submit_button')) }}
            </div>
            <div class="col-md-2">
                <a href="{{ URL::route('customer.edit', $customer->id) }}"><button type="button" class="btn btn-warning btn-block">Reset</button></a>
            </div>
            <div class="col-md-2">
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