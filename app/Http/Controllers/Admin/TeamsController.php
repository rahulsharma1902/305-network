<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,Position,Coache,Player,Team,TeamCoache,TeamPlayer};
use DB;
use Illuminate\Validation\Rule;
class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index',compact('teams'));
        // return view('admin.coaches.index');
    }
    public function add(Request $request){
        $sports = Sport::with('positions')->get();
        $coaches = Coache::all();
        $players = Player::all();
        // $sports = Sport::with('positions')->get()->toArray();

        // echo '<pre>';
        // print_r($sports);
        // die();
        return view('admin.teams.add',compact('sports','coaches','players'));
    }
    public function addProcc(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|unique:teams,name,' . ($request->id ?? 'NULL') . ',id',
            'slug' => 'required|string|unique:teams,slug,' . ($request->id ?? 'NULL') . ',id',
            'sport_id' => 'required|exists:sports,id',
            // 'season_year' => 'required|integer|min:1900|max:' . now()->year,
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:3048',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:3048',
       
            'coaches_id' => 'required|array',
            'coaches_id.*' => 'exists:coaches,id',
    
                'players_id' => $request->id ? 'nullable|array' : 'required|array',
                'players_id.*' => 'exists:players,id',
        ]);
        // echo '<pre>';
        // print_r($request->all());
        // die();
        if ($request->id) {
            $team = Team::find($request->id);
            if (!$team) {
                return redirect()->back()->with('error', 'Team not found.');
            }
        } else {
            $team = new Team;
        }
    
        $team->name = $request->name;
        $team->slug = $request->slug;
        $team->sport_id = $request->sport_id;
        $team->season_year = now()->year;
    
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoExtension = $logo->getClientOriginalExtension();
            $logoName = $request->slug . '-logo-' . time() . '.' . $logoExtension;
            $logo->move(public_path('Teams/logos/'), $logoName);
            $team->logo = 'Teams/logos/' . $logoName; 

        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $logoExtension = $image->getClientOriginalExtension();
            $imageName = $request->slug . '-logo-' . time() . '.' . $logoExtension;
            $image->move(public_path('Teams/images/'), $imageName);
            $team->image = 'Teams/images/' . $imageName; 

        }
    
        $team->save();
    
        TeamCoache::where('team_id', $team->id)->delete();
        foreach ($request->coaches_id as $coachId) {
            TeamCoache::create([
                'team_id' => $team->id,
                'coach_id' => $coachId,
            ]);
        }
    
        // TeamPlayer::where('team_id', $team->id)->delete();
        if(!$request->id){
        foreach ($request->players_id as $playerId) {
            TeamPlayer::create([
                'team_id' => $team->id,
                'player_id' => $playerId,
                'season_year' => now()->year,
                'status' => 'playing', 
            ]);
        }
        }   
    
        $message = $request->id ? 'Team updated successfully.' : 'Team added successfully.';
        if(!$request->id){
            return redirect()->route('team-manage-player', ['teamId' => $team->id])->with('success', $message);

        }
        return redirect()->back()->with('success', $message);
    }

    public function update(Request $request,$teamId){
        if($teamId){
            $sports = Sport::with('positions')->get();
            $coaches = Coache::all();
            $players = Player::all();
            $teams = Team::where('id',$teamId)->first();
            if($teams){
                return view('admin.teams.update',compact('teams','sports','coaches','players'));
            }
        }
        return redirect()->back()->with('error','teams does not exist.');
    }
    
    public function managePlayers(Request $request, $teamId){
        // $teams = Team::with('players.player','sport')->where('id',$teamId)->first()->toArray();
        $teams = Team::with('players.player','sport')->where('id',$teamId)->first();
        // echo '<pre>';
        // print_r($teams);
        // die();
        $players = Player::all();

        $positions = Position::where('sport_id',$teams->sport_id)->where('category','player')->get();
        return view('admin.teams.manage-players',compact('teams','positions','players'));

    }
    public function updatePlayerPosition(Request $request)
    {
        // return response()->json(['success' => true, 'message' => 'Position updated successfully']);
        $player = TeamPlayer::where('id', $request->player_id)->first();
        if($request->status){
            if ($player) {
                $player->status = $request->status;
                $player->save();
                return response()->json(['success' => true, 'message' => 'Status updated successfully']);
            }
        }else{
        

        if ($player) {
            $player->position_id = $request->position_id;
            $player->save();
            return response()->json(['success' => true, 'message' => 'Position updated successfully']);
        }
        }
        return response()->json(['success' => false, 'message' => 'Player not found'], 404);
    }
    public function addNewPlayer(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'player_id' => [
                'required',
                Rule::exists('players', 'id'), 
                Rule::unique('team_players', 'player_id')->where(function ($query) use ($request) {
                    return $query->where('team_id', $request->team_id);
                }) 
            ],
            'position_id' => 'required|exists:positions,id' ,
            'season_year' => 'required',
        ]);
        $teamPlayer = new TeamPlayer;
        $teamPlayer->team_id = $request->team_id;
        $teamPlayer->player_id = $request->player_id;
        $teamPlayer->position_id = $request->position_id;
        $teamPlayer->season_year = $request->season_year;
        $teamPlayer->save();
        return redirect()->back()->with('success','Player has been added to your team.');

    
    }


    public function playerSportHistory(){
        
    }

}
