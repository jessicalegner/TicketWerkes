<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TicketWerkes - Invoice</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="app-layout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6">
                <h1>
                    <img style="width: 150px;" src="http://mrmoustachesphonerepair.com/images/logo.png">
                </h1>
            </div>
            <div class="col-xs-6 text-right">
                <h1>INVOICE</h1>
                <h1><small>Ticket #{{ $ticket->id }}</small></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">From: Mr. Moustache's Phone Repair</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Address <br>
                            details <br>
                            more <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-5 col-xs-offset-1 text-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">To: {{ $ticket->customer->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $ticket->customer->city }} <br>
                            {{ $ticket->customer->zip }} <br>
                            {{ $ticket->customer->contact_phone }} <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- / end client details section -->

        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Invoice Details</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-right"><strong>Total (tax)</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $ticket->description }}</td>
                                    <td class="text-center">${{ ($ticket->price)/100 }}</td>
                                    <td class="text-right">${{ round(((($ticket->price)/100)*1.06),2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
