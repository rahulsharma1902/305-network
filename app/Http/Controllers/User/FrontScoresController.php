<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,Team,Coache,Player,Matches};

class FrontScoresController extends Controller
{
   public function index(Request $request){
    $teams = Team::with('sport','players.player','coaches.coach','players.position')
        ->get()
        // ->toArray()
        ;
        //  echo '<pre>';
        // print_r($teams);
        // die();
    $featuredMatches = Matches::with('team1','team2')->where('highlight_status','featured')->get();
    //    echo '<pre>';
    //     print_r($featuredMatches);
    //     die();
    return view('user.scores.scores',compact('teams','featuredMatches'));
   }
   public function fetchData(Request $request)
    {
        $date = $request->query('date', now()->format('Y-m-d'));
        $data = Matches::with('team1','team2')->whereDate('match_date', $date)->get();
        
        return response()->json($data);
    }
    public function fetchFavoriteMatchData(Request $request)
    {
        $favorites = $request->input('favorites'); // Get favorites from the request

        if ($favorites && count($favorites) > 0) {
            $matches = Matches::with('team1','team2')->whereIn('id', $favorites)->get(); 
            return response()->json($matches);
        } else {
            return response()->json(['message' => 'No favorite matches found.']);
        }
    }

    public function scoreboard(Request $request , $matchId , $team){
        if($matchId){
            $match = Matches::with(['manofthematch.teamPlayer.team',
                'sportAttributes.matchPlayerStats' => function($q) use ($matchId) {
                    $q->where('match_id', $matchId);
                },
                'team1.players.matchPlayerStats' => function($q) use ($matchId) {
                    $q->where('match_id', $matchId);
                },
                'team2.players.matchPlayerStats' => function($q) use ($matchId) {
                    $q->where('match_id', $matchId);
                }
            ])
            ->where('id', $matchId)
            ->first()
            // ->toArray()
            ; 
                // echo '<pre>';
                // print_r($match);
                // die();
            $selectedTeam = 'team1';
            if ($team == 'team-1') {
                $selectedTeam = 'team1';
            } elseif ($team == 'team-2') {
                $selectedTeam = 'team2';
            } else {
                $selectedTeam = 'team1';
            }
            return view('user.scoreboard.index',compact('match','selectedTeam'));
        }
    }

}
