<div class="well well-sm">
    <table id="ticketsTable" class="display responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Ticket No.</th>
                <th>Status</th>
                <th>Customer</th>
                <th>Device Phone Number</th>
                <th>Description</th>
                <th>Updated</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td><a href="{{ URL::route('ticket.show', $ticket->id) }}">{{ $ticket->id }}</a></td>
            <td><span class="label label-{{ $ticket->status->color }}">{{ $ticket->status->name }}</span></td>
            <td>{{ $ticket->customer->name }}</td>
            <td>{{ $ticket->device_phone_number }}</td>
            <td>{{ $ticket->description }}</td>
            <td>{{ $ticket->updated_at->format('m/d/Y') }}</td>
            <td class="actions text-center">
                <a href="{{ URL::route('ticket.show', $ticket->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                <a href="{{ URL::route('ticket.edit', $ticket->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <a href="{{ URL::route('ticket.print', $ticket->id) }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                {{ Form::open(array('route' => array('ticket.destroy', 'id' => $ticket->id), 'class' => 'inline-buttons', 'method' => 'delete', 'id' => 'deleteButton')) }}
                <button type="submit" class="btn btn-danger" data-confirm="Are you sure you want to delete?"><i class="fa fa-trash"></i></button>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>