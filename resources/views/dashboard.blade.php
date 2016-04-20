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
                    <div id="locationLoadLegend"></div>
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
                    <h3 class="panel-title">Ticket Volume</h3>
                </div>
                <div class="panel-body">
                    <div id="dashboardConversions">
                    	<canvas id="ticketVolumeChart"></canvas>
                    </div>
                    <div id="ticketVolumeLegend"></div>
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
                    <h3 class="panel-title">Some other item</h3>
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')
	$(window).load(function(){
		// LOCATION LOAD CHART
		var ctx = $("#locationLoadChart").get(0).getContext("2d");
		var data = [
		    {
		        value: 300,
		        color:"#F7464A",
		        highlight: "#FF5A5E",
		        label: "Freeland"
		    },
		    {
		        value: 50,
		        color: "#46BFBD",
		        highlight: "#5AD3D1",
		        label: "Midland"
		    }
		]
		var locationLoadPieChart = new Chart(ctx).Pie(data, {
			legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

		});

		var legend = locationLoadPieChart.generateLegend();
		$("#locationLoadLegend").html(legend);

		// TICKET VOLUME CHART
		var ctx = $("#ticketVolumeChart").get(0).getContext("2d");
		var data = {
	    labels: ["M", "T", "W", "Th", "F", "S"],
	    datasets: [
	        {
	            label: "Last Week",
	            fillColor: "rgba(220,220,220,0.5)",
	            strokeColor: "rgba(220,220,220,0.8)",
	            highlightFill: "rgba(220,220,220,0.75)",
	            highlightStroke: "rgba(220,220,220,1)",
	            data: [65, 59, 80, 81, 56, 55]
	        },
	        {
	            label: "This Week",
	            fillColor: "rgba(151,187,205,0.5)",
	            strokeColor: "rgba(151,187,205,0.8)",
	            highlightFill: "rgba(151,187,205,0.75)",
	            highlightStroke: "rgba(151,187,205,1)",
	            data: [28, 0, 0, 0, 0, 0]
	        }
	    ]
	};
		var ticketVolumeBarChart = new Chart(ctx).Bar(data, {
			legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

		});

		var tlegend = ticketVolumeBarChart.generateLegend();
		$("#ticketVolumeLegend").html(tlegend);
	});
@stop