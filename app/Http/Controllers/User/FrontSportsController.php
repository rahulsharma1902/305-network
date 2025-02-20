<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,Team,Coache,Player};
use Carbon\Carbon;

class FrontSportsController extends Controller
{
    //
    public function sportsTeam(Request $request,$sport,$team){
        $team = Team::with('sport','players.player','coaches.coach','players.position')->where('slug',$team)
        ->first()
        // ->toArray()
        ;
        // echo '<pre>';
        // print_r($team);
        // die();
        return view('user.sports.sports-team',compact('team'));
    }
    public function coachBio(Request $request,$sport,$team,$coach){
        $coach = Coache::where('slug',$coach)
        ->first()
        // ->toArray()
        ;
        $team = Team::with('sport','players.player','coaches.coach','players.position')->where('slug',$team)
        ->first();
        //  echo '<pre>';
        // print_r($coach);
        // die();
        return view('user.sports.coach-bio',compact('coach','team'));

    }
    public function playerBio(Request $request,$sport,$team,$player){
        $player = Player::where('slug',$player)
        ->first()
        // ->toArray()
        ;
        $team = Team::with('sport','players.player','coaches.coach','players.position')->where('slug',$team)
        ->first();
        //  echo '<pre>';
        // print_r($player);
        // die();
        
        return view('user.sports.player-bio',compact('player','team'));

    }



}
