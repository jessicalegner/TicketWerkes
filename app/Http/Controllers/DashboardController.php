<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Ticket;
use App\Status;
use DB;
use Auth;

class DashboardController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}
	
    public function index() 
  	{
  		$locationTotals = $this->locationLoadReport();
  		$lastWeekTickets = $this->lastWeekTickets();
  		$thisWeekTickets = $this->thisWeekTickets();
  		$ticketStatusCount = $this->ticketStatusReport();
  		$ticketStatuses = $this->ticketStatuses();
    	return view('dashboard', compact('locationTotals', 'thisWeekTickets', 'lastWeekTickets', 'ticketStatuses', 'ticketStatusCount'));
  	}

  	private function locationLoadReport() 
  	{
  		return DB::table('tickets')
            ->select(DB::raw('COUNT(id) as `count`'))
            ->groupBy('user_id')
            ->lists('count');
  	}

  	private function lastWeekTickets()
  	{
  		Carbon::setWeekStartsAt(Carbon::MONDAY);
		Carbon::setWeekEndsAt(Carbon::SATURDAY);
  		$lastMonday = Carbon::now()->startOfWeek()->subWeeks(1)->toDateString();
  		$lastSaturday = Carbon::now()->endOfWeek()->subWeeks(1)->toDateString();

   		return Ticket::select( DB::raw('COUNT(id) as `count`'))
  			->where('created_at', '>=', $lastMonday)
  			->where('created_at', '<=', $lastSaturday)
  			->groupBy('created_at')
        	->orderBy('created_at', 'DESC')
  			->lists('count');
  	}

  	private function thisWeekTickets()
  	{
  		$thisMonday = Carbon::now()->startOfWeek()->toDateString();
  		$thisSaturday = Carbon::now()->endOfWeek()->toDateString();

  		return Ticket::select( DB::raw('COUNT(id) as `count`'))
  			->where('created_at', '>=', $thisMonday)
  			->where('created_at', '<=', $thisSaturday)
  			->groupBy('created_at')
        	->orderBy('created_at', 'DESC')
  			->lists('count');
  	}

  	private function ticketStatusReport() {
	  	return Ticket::select(DB::raw('COUNT(id) as `count`'))
  			// ->leftJoin('tickets', 'statuses.id', '=', 'tickets.status_id')
  			->groupBy('status_id')
  			->orderBy('status_id')
  			->lists('count');
  	}

  	private function ticketStatuses() {
	  	return  Status::select(DB::raw('statuses.name'))
  			->join('tickets', 'statuses.id', '=', 'tickets.status_id')
  			->groupBy('statuses.id')
  			->orderBy('statuses.id')
  			->lists('name');
  	}
}