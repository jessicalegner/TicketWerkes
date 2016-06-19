<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="@yield('dashboard.class')"><a href="{{ URL::route('dashboard') }}"> <i class="fa fa-tachometer"></i> Dashboard</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="nav-header">Tickets</li>
        <li class="@yield('tickets.class')"><a href="{{ URL::route('tickets.index') }}"><i class="fa fa-files-o"></i> All Tickets</a></li>
        <li class="@yield('newtickets.class')"><a href="{{ URL::route('tickets.new') }}"><span class="label label-primary">{{ $data['newTicketCount'] }}</span> New Ticket{{ ($data['newTicketCount'] > 1) ? 's' : '' }}</a></li>
        <li class="@yield('newticket.class')"><a href="{{ URL::route('ticket.create') }}"><i class="fa fa-plus-circle"></i> Create Ticket</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="nav-header">Customers</li>
        <li class="@yield('customers.class')"><a href="{{ URL::route('customers.index') }}"><i class="fa fa-users"></i> All Customers</a></li> 
        <li class="@yield('newcustomer.class')"><a href="{{ URL::route('customer.create') }}"><i class="fa fa-user-plus"></i> Create Customer</a></li> 
    </ul>
</div>