<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Ticket Information</h3>
    </div>
    <div class="panel-body">
        @if(isset($statuses))
        <div class="row">
            <div class="form-group col-sm-12">
                {{ Form::label('status_id', 'Status') }}
                {{ Form::select('status_id', $statuses,  isset($ticket) ? $ticket->status->id : '', array('class' => 'form-control'))}}
            </div>
        </div>
        @endif
        <div class="row">
            <div class="form-group col-sm-6">
                {{ Form::label('device_phone_number', 'Device Phone Number') }}
                {{ Form::text('device_phone_number', isset($ticket) ? $ticket->device_phone_number : '', array('class' => 'form-control', 'id' => 'device_phone_number', 'placeholder' => 'Device Phone Number', 'maxlength' => '14')) }}
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label('unlock_code', 'Device Unlock Code') }}
                {{ Form::text('unlock_code', isset($ticket) ? $ticket->device_unlock_code : '', array('class' => 'form-control', 'id' => 'unlock_code', 'placeholder' => 'Unlock Code')) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                {{ Form::label('description', 'Work Description') }}
                {{ Form::textarea('description', isset($ticket) ? $ticket->description : '', array('class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description of work to be done', 'size' => '5x4')) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                {{ Form::label('price', 'Price') }}
                {{ Form::text('price', isset($ticket) ? $ticket->price : '', array('class' => 'form-control', 'id' => 'price', 'placeholder' => '$')) }}
            </div>
        </div>
    </div>
</div>