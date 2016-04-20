@extends('layouts.master')

@section('title', 'New Tickets')
@section('newtickets.class', 'active')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @if(Session::has('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-6">
            <h3>New Tickets</h3>
        </div>
        <div class="col-xs-6">
            <a href="{{ URL::route('ticket.create') }}" class="pull-right"><button type="button" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Create Ticket</button></a>
        </div>
    </div>

    @if($tickets)
        @include('partials.ticket_table')
    @else
        <p>No tickets exist</p>
    @endif
</div>
@endsection

@section('javascript')
$(document).ready(function(){
    $('#ticketsTable').DataTable({
        "columnDefs": [
            {
                "targets": [ 5 ],
                "sorting": false
            }
        ],
        "language": {
            "emptyTable": "There are no tickets"
        }
    });

    $('button[data-confirm]').click(function(ev) {
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div class="modal fade" tabindex="-1" role="dialog" id="dataConfirmModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Delete Ticket</h4></div><div class="modal-body"><p>One fine body&hellip;</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button id="dataConfirmOK" type="button" class="btn btn-danger">Delete</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- /.modal -->');
        } 
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').click(function() {
            $('#deleteButton').submit();
        });
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});
@endsection