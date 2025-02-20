<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\{Sport, Matches ,HeaderPage,FooterPage};
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $sports = Sport::with('teams')->get();
            $upcomingMatches = Matches::with('team1','team2','sports')->where('match_date', '>=', Carbon::today())->get(); 
            $headerPage = HeaderPage::first();
            $footerPage = FooterPage::first();

            $view->with('sports', $sports);
            $view->with('upcomingMatches', $upcomingMatches);
            $view->with('headerPage', $headerPage);
            $view->with('footerPage', $footerPage);
        });
    }
}
