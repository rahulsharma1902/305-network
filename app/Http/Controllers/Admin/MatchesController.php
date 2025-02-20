<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,Position,Coache,Team,Matches,TeamPlayer,MatchPlayerStat,SportAttribute};

class MatchesController extends Controller
{
    public function index()
    {
        $matches = Matches::all();
        return view('admin.matches.index',compact('matches'));
    }
    public function add(Request $request){
        $sports = Sport::all();
        $teams = Team::all();
        return view('admin.matches.add',compact('sports','teams'));
    }
    public function sportData(Request $request, $sportId){
        $teams = Team::where('sport_id',$sportId)->get();
        return response()->json($teams);
    }
    public function getPlayers(Request $request, $team1, $team2){
        $teamsPlayer = TeamPlayer::with('player')->where('team_id', $team1)
                                 ->orWhere('team_id', $team2)
                                 ->get();
    
        return response()->json($teamsPlayer);
    }
    public function addProcc(Request $request)
    {
        
        $request->validate([
            'sport_id'   => 'required|exists:sports,id',
            'team1_id'   => 'required|exists:teams,id',
            'team2_id'   => 'required|exists:teams,id|different:team1_id', // Ensures team1_id != team2_id
            'match_date' => 'required|date',
            'match_time' => 'required',
            'status'     => 'required|in:done,upcoming,live',
            'highlight_status'     => 'required|in:featured,non_featured',
            'season_year' => 'required|integer|min:2000|max:' . date('Y'),
        ], [
            'team2_id.different' => 'Team 1 and Team 2 must be different.',
        ]);
        // echo '<pre>';
        // print_r($request->all());
        // die();
        $team1 = Team::where('id', $request->team1_id)->where('sport_id', $request->sport_id)->exists();
        $team2 = Team::where('id', $request->team2_id)->where('sport_id', $request->sport_id)->exists();

        if (!$team1 || !$team2) {
            return redirect()->back()->with('error', 'Both teams must belong to the selected sport.');
        }

        $match = $request->id ? Matches::find($request->id) : new Matches();

        if ($request->id && !$match) {
            return redirect()->back()->with('error', 'Match not found.');
        }

        $match->sport_id    = $request->sport_id;
        $match->team1_id    = $request->team1_id;
        $match->team2_id    = $request->team2_id;
        $match->match_date  = $request->match_date;
        $match->match_time  = $request->match_time;
        $match->highlight_status      = $request->highlight_status;
        $match->status      = $request->status;
        $match->season_year = $request->season_year;
        
        if ($request->status === 'done') {
        //     echo '<pre>';
        // print_r($request->all());
        // die();
            $request->validate([
                'score_team1' => 'nullable|integer|min:0',
                'score_team2' => 'nullable|integer|min:0',
                'winning_team'   => 'required|exists:teams,id',
                'manof_match_id'   => 'required|exists:players,id',


            ]);

            $match->score_team1 = $request->score_team1;
            $match->score_team2 = $request->score_team2;
            $match->winning_team = $request->winning_team;
            $match->manof_match_id = $request->manof_match_id;
            
        }
        if ($request->status === 'live') {
            $request->validate([
                'score_team1' => 'nullable|integer|min:0',
                'score_team2' => 'nullable|integer|min:0',


            ]);

            $match->score_team1 = $request->score_team1;
            $match->score_team2 = $request->score_team2;
        }

        $match->save();
        if ($request->status === 'done' && $match->team_update == 0) {
            // Fetch players and sport attributes
            $players = TeamPlayer::with('player')
                        ->whereIn('team_id', [$match->team1_id, $match->team2_id])
                        ->get() ?? collect();
                        
            $sportAttributes = SportAttribute::where('sport_id', $match->sport_id)
                                ->get() ?? collect();
        
            if ($sportAttributes->isNotEmpty() && $players->isNotEmpty()) {
                foreach ($sportAttributes as $sportAttribute) {
                    if (!$sportAttribute->id) continue;
                    
                    foreach ($players as $player) {
                        if (!$player->id) continue; 
                        MatchPlayerStat::updateOrCreate(
                            [
                                'match_id' => $match->id ?? null,
                                'player_id' => $player->id,
                                'attribute_id' => $sportAttribute->id,
                            ],
                            ['attribute_value' => null]
                        );
                    }
                }
            }
        }
        

        $message = $request->id ? 'Match updated successfully.' : 'Match added successfully.';
        
        return redirect()->back()->with('success', $message);
    }

    public function update(Request $request,$matchId){
        if($matchId){
            $sports = Sport::all();
            $match = Matches::where('id',$matchId)->first();
            $teams = Team::all();
            // $players = players::where('')
            if($match){
                return view('admin.matches.update',compact('match','sports','teams'));
            }
        }
        return redirect()->back()->with('error','match does not exist.');
    }

    
    public function updateMatchRecord(Request $request,$matchId){
        if($matchId){
            if($matchId){
                $match = Matches::with([
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
                ->first();
                
                // ->first()->toArray();
            }
            
        
        // echo '<pre>';
        //     print_r($match);
        //     die();
        if($match){
            $players = TeamPlayer::with('player')->where('team_id', $match->team1_id)
            ->orWhere('team_id', $match->team2_id)
            ->get();
            // echo '<pre>';
            // print_r($players);
            // die();
                return view('admin.matches.match-record',compact('match','players'));
            }
        }
        return redirect()->back()->with('error','match does not exist.');

    }
    public function updateMatchRecordAttr(Request $request,$matchId,$playerId){
        $playerAttr = MatchPlayerStat::with('attribute','player','matchdata.team1','matchdata.team2')->where('match_id',$matchId)->where('player_id',$playerId)
        ->get();
        // ->toArray();
        // echo '<pre>';
        // print_r($playerAttr);
        // die();
        return view('admin.matches.match-attr',compact('playerAttr'));
    }
    public function addMatchRecordProcc(Request $request) {
        $validated = $request->validate([
            'match_id' => 'required|exists:matches,id',
            'player_id' => 'required|exists:players,id',
            'attributes' => 'required|array',
        ]);
    //     echo '<pre>';
    //     print_r($request->all());
    //     die();
        foreach ($validated['attributes'] as $attributeId => $value) {
            MatchPlayerStat::where([
                    'match_id' => $validated['match_id'],
                    'player_id' => $validated['player_id'],
                    'attribute_id' => $attributeId,
                ])->update(['attribute_value' => $value]);
            
            Matches::where('id', $validated['match_id'])->update(['team_update' => 1]);
        }
    
        return redirect()->back()->with('success', 'Match records updated successfully!');
    }
}
