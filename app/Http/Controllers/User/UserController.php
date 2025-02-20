<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{Sport,HomePage,HomePageMedia};
class UserController extends Controller
{
    public function home(Request $request ){
        $homePage = HomePage::with('bannerSliders','matchHighlights','matchNotifications','newsTickerContents')
        ->first();
        return view('user.home.home',compact('homePage'));
    }

    public function coachbio(Request $request ){
        return view('user.coachbio.coachbio');
    }
    public function player_bio(Request $request ){
        return view('user.player-bio.player-bio');
    }

    public function scoreboard(Request $request ){
        return view('user.scoreboard.scoreboard');
    }

    public function scores(Request $request ){
        return view('user.scores.scores');
    }
    public function sports(Request $request ){
        return view('user.sports.sports');

    }
}
