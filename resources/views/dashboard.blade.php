@extends('layouts.master')

@section('title', 'Dashboard')

@section('dashboard.class')
active
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2>Dashboard</h2>
	<p>Overview and statistics</p>
	<div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="panel-actions">
                        <div id="reportrange" class="pull-right">
                            <i class="fa fa-calendar"></i>
                            <span>This month</span> <b class="caret"></b>
                        </div>
                    </div> -->
                    <h3 class="panel-title">Location Load</h3>
                </div>
                <div class="panel-body">
                    <div id="dashboardConversions">
                    	<canvas id="locationLoadChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="panel-actions">
                        <div id="reportrange" class="pull-right">
                            <i class="fa fa-calendar"></i>
                            <span>This month</span> <b class="caret"></b>
                        </div>
                    </div> -->
                    <h3 class="panel-title">New Ticket Volume</h3>
                </div>
                <div class="panel-body">
                    <div id="dashboardConversions">
                    	<canvas id="ticketVolumeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="panel-actions">
                        <div id="reportrange" class="pull-right">
                            <i class="fa fa-calendar"></i>
                            <span>This month</span> <b class="caret"></b>
                        </div>
                    </div> -->
                    <h3 class="panel-title">Ticket Statuses</h3>
                </div>
                <div class="panel-body">
                    <div id="dashboardConversions">
                    	<canvas id="ticketStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="panel-actions">
                        <div id="reportrange" class="pull-right">
                            <i class="fa fa-calendar"></i>
                            <span>This month</span> <b class="caret"></b>
                        </div>
                    </div> -->
                    <h3 class="panel-title">New Customers this Month</h3>
                </div>
                <div class="panel-body">
                	<h1 class="text-center">{{ $newCustomerCount }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')
	$(window).load(function(){
		// LOCATION LOAD CHART
		var ctx = $("#locationLoadChart");

		var data = {
		    labels: [
		        "Freeland",
		        "Midland"
		    ],
		    datasets: [
		        {
		            data: {!! json_encode($locationTotals) !!},
		            backgroundColor: [
		                "#FF6384",
		                "#36A2EB"
		            ],
		            hoverBackgroundColor: [
		                "#FF6384",
		                "#36A2EB"
		            ]
		        }]
		};

		var locationLoadChart = new Chart(ctx,{
		    type: 'pie',
		    data: data
		});

		// TICKET VOLUME CHART
		var ctx = $("#ticketVolumeChart");
		var data = {
		    labels: ["M", "T", "W", "Th", "F", "S"],
		    datasets: [
		        {
		            label: "Last Week",
		            backgroundColor: "rgba(255,99,132,0.2)",
		            borderColor: "rgba(255,99,132,1)",
		            borderWidth: 1,
		            hoverBackgroundColor: "rgba(255,99,132,0.4)",
		            hoverBorderColor: "rgba(255,99,132,1)",
		            data: {{ json_encode($lastWeekTickets) }}
		        },
		        {
		            label: "This Week",
		            backgroundColor: "rgba(102,163,226,0.2)",
		            borderColor: "rgba(102,163,226,1)",
		            borderWidth: 1,
		            hoverBackgroundColor: "rgba(102,163,226,0.4)",
		            hoverBorderColor: "rgba(102,163,226,1)",
		            data: {{ json_encode($thisWeekTickets) }}
		        }
		    ]
		};

		var ticketVolumeChart = new Chart(ctx,{
		    type: 'bar',
		    data: data
		});

		// TICKET STATUS REPORT
		var ctx = $("#ticketStatusChart");
		var data = {
		    labels: {!! json_encode($ticketStatuses) !!},
		    datasets: [
		        {
		            data: {!! json_encode($ticketStatusCount) !!},
		            backgroundColor: [
		                "#FF6384",
		                "#36A2EB"
		            ],
		            hoverBackgroundColor: [
		                "#FF6384",
		                "#36A2EB"
		            ]
		        }]
		};

		var ticketStatusChart = new Chart(ctx,{
		    type: 'doughnut',
		    data: data
		});
	});
@stop