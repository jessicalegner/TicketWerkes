@extends('layouts.master')

@section('title', 'All Customers')
@section('customers.class', 'active')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @if(Session::get('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-6">
            <h3>All Customers</h3>
        </div>
        <div class="col-xs-6">
            <a href="{{ URL::route('customer.create') }}" class="pull-right"><button type="button" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Create Customer</button></a>
        </div>
    </div>

    @if($customers)
        <div class="well well-sm">
            <table id="customersTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Contact Phone</th>
                        <th>Alternative Contact</th>
                        <th>City</th>
                        <th>Zip</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->contact_phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->zip }}</td>
                    <td class="actions text-center">
                        <a href="{{ URL::route('ticket.createForCustomer', $customer->id) }}" class="btn btn-primary"><i class="fa fa-file-o"></i></a>
                        <a href="{{ URL::route('customer.show', $customer->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{ URL::route('customer.edit', $customer->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        {{ Form::open(array('route' => array('customer.destroy', 'id' => $customer->id), 'class' => 'inline-buttons', 'method' => 'delete', 'id' => 'deleteButton')) }}
                        <button type="submit" class="btn btn-danger" data-confirm="Are you sure you want to delete?"><i class="fa fa-trash"></i></button>
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No customers exist</p>
    @endif
</div>
@endsection

@section('javascript')
$(document).ready(function(){
    $('#customersTable').DataTable({
        "columnDefs": [
            {
                "targets": [ 5 ],
                "sorting": false
            }
        ],
        "language": {
            "emptyTable": "There are no customers"
        }
    });

    $('button[data-confirm]').click(function(ev) {
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div class="modal fade" tabindex="-1" role="dialog" id="dataConfirmModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Delete Customer</h4></div><div class="modal-body"><p>One fine body&hellip;</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button id="dataConfirmOK" type="button" class="btn btn-danger">Delete</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- /.modal -->');
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