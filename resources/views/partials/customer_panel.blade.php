<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Customer Information</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-sm-12">
                {{ Form::label('name', 'Name*') }}
                {{ Form::text('name', isset($customer) ? $customer->name : '', array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name')) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', isset($customer) ? $customer->city : '', array('class' => 'form-control', 'id' => 'city', 'placeholder' => 'City')) }}
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label('zip', 'Zip') }}
                {{ Form::text('zip', isset($customer) ? $customer->zip : '', array('class' => 'form-control', 'id' => 'zip', 'placeholder' => 'Zip', 'maxlength' => '5')) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                {{ Form::label('contact_phone', 'Contact Phone*') }}
                {{ Form::text('contact_phone', isset($customer) ? $customer->contact_phone : '', array('class' => 'form-control', 'id' => 'contact_phone', 'placeholder' => 'Contact Phone', 'maxlength' => '14')) }}
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label('email', 'Other Contact') }}
                {{ Form::text('email', isset($customer) ? $customer->email : '', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Phone or email')) }}
            </div>
        </div>
    </div>
</div>