<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ticket;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $newTicketsCount = Ticket::where('status_id', 1)->count();
        View::share('data', ['newTicketCount'=>$newTicketsCount]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
