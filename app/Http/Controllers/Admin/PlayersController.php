<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,Position,Coache,Player,PlayerAttribute};
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('admin.players.index',compact('players'));
    }
    public function add(Request $request){
        $positions = Position::all();
        return view('admin.players.add',compact('positions'));
    }

    // public function addProcc(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'image' => $request->id ? 'nullable|file|mimes:jpeg,png,jpg,gif|max:3048' : 'required|file|mimes:jpeg,png,jpg,gif|max:3048',
    //         'banner_image_video' => [
    //             'nullable',
    //             'file',
    //             'max:10000',
    //             function ($attribute, $value, $fail) {
    //                 $allowedMimeTypes = ['jpeg', 'png', 'jpg', 'gif', 'mp4', 'mov', 'avi', 'wmv','webp'];
    //                 if (!in_array($value->getClientOriginalExtension(), $allowedMimeTypes)) {
    //                     $fail('The ' . $attribute . ' must be a valid image or video file.');
    //                 }
    //             },
    //         ],
    //         'twitter' => 'nullable|url',
    //         'facebook' => 'nullable|url',
    //         'instagram' => 'nullable|url',
    //         'bio' => 'nullable',
    //         'academic_info' => 'nullable',
    //         'highlight_media' => 'nullable',
    //         'achievements_award' => 'nullable',
    //         'recruiting_info' => 'nullable',
    //         'season_stat' => 'nullable',
    //         'high_school' => 'nullable',
    //         'athletic_info' => 'nullable',            
    //         'email' => 'required|string',
    //         'phone' => 'required|string',
    //         'attribute_names' => 'nullable|array',
    //         'attribute_names.*' => 'required_with:attribute_values.*|string',
    //         'attribute_values' => 'nullable|array',
    //         'attribute_values.*' => 'required_with:attribute_names.*|string',
    //     ]);
    
    //     if ($request->id) {
    //         $player = Player::where('id', $request->id)->first();
    //         if (!$player) {
    //             return redirect()->back()->with('error', 'Player not found.');
    //         }
    //     } else {
    //         $player = new Player;
    //     }
    
    //     $player->first_name = $request->first_name;
    //     $player->last_name = $request->last_name;
    //     $player->twitter = $request->twitter;
    //     $player->instagram = $request->instagram;
    //     $player->facebook = $request->facebook;
    //     $player->height = $request->height;
    //     $player->weight = $request->weight;
    //     $player->dob = $request->dob;
    //     $player->experience = $request->experience;
    //     $player->location = $request->location;
    //     $player->jersey_no = $request->jersey_no;
    //     $player->bio = $request->bio;
    //     $player->email = $request->email;
    //     $player->phone = $request->phone;
    //     $player->high_school = $request->high_school;
    //     $player->graduation_year = $request->graduation_year;
    //     $player->student_id = $request->student_id;
    //     $player->athletic_info = $request->athletic_info;
    //     $player->season_stat = $request->season_stat;
    //     $player->academic_info = $request->academic_info;
    //     $player->highlight_media = $request->highlight_media;
    //     $player->achievements_award = $request->achievements_award;
    //     $player->recruiting_info = $request->recruiting_info;
    
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('Players/'), $imageName);
    //         $player->image = 'Players/' . $imageName;
    //     }
    
    //     if ($request->hasFile('banner_image_video')) {
    //         $file = $request->file('banner_image_video');
    //         $fileNameBanner = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('Players/'), $fileNameBanner);
    //         $player->banner_image_video = 'Players/' . $fileNameBanner;
    //     }
    
    //     $player->save();
    
    //     if ($request->attribute_names && $request->attribute_values) {
    //         PlayerAttribute::where('player_id', $player->id)->delete();
    //         foreach ($request->attribute_names as $key => $attribute_name) {
    //             if (!empty($attribute_name) && !empty($request->attribute_values[$key])) {
    //                 PlayerAttribute::create([
    //                     'player_id' => $player->id,
    //                     'attribute_name' => $attribute_name,
    //                     'attribute_value' => $request->attribute_values[$key],
    //                 ]);
    //             }
    //         }
    //     }
    
    //     $message = $request->id ? 'Player updated successfully.' : 'Player added successfully.';
    //     return redirect()->back()->with('success', $message);
    // }
    public function addProcc(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'image' => $request->id ? 'nullable|file|mimes:jpeg,png,jpg,gif|max:3048' : 'required|file|mimes:jpeg,png,jpg,gif|max:3048',
            // 'banner_image_video' => [
            //     'nullable',
            //     'file',
            //     'max:10000',
            //     function ($attribute, $value, $fail) {
            //         $allowedMimeTypes = ['jpeg', 'png', 'jpg', 'gif', 'mp4', 'mov', 'avi', 'wmv', 'webp'];
            //         if (!in_array($value->getClientOriginalExtension(), $allowedMimeTypes)) {
            //             $fail('The ' . $attribute . ' must be a valid image or video file.');
            //         }
            //     },
            // ],
            'banner_image_video' => 'nullable|url',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'email' => 'nullable|string|email',
            'phone' => 'nullable|string',

            // Additional Fields
            'dob' => 'nullable|date',
            'height' => 'nullable|string',
            'weight' => 'nullable|string',
            'jersey_number' => 'nullable|integer',
            'graduation_year' => 'nullable|integer',
            'class' => 'nullable|string',
            'high_school' => 'nullable|string',
            'gpa' => 'nullable|string',
            'sat_act_scores' => 'nullable|string',
            'academic_honors' => 'nullable|string',
            'academic_info' => 'nullable|string',

            // Media
            'highlight_info' => 'nullable|string',
            'highlight_videos' => 'nullable|array',
            'highlight_videos.*' => 'nullable|url',
            'game_footage_link' => 'nullable|url',
            'photo_gallery_link' => 'nullable|url',

            // Awards & Camps
            'award_info' => 'nullable|string',
            'team_mvp_award' => 'nullable|string',
            'all_state_honors' => 'nullable|string',
            'athletic_camps_attended' => 'nullable|string',

            // Recruiting Info
            'recruting_info' => 'nullable|string',
            'commitment_status' => 'nullable|string',
            'offers_received' => 'nullable|string',
            'preferred_colleges' => 'nullable|string',

            'attribute_names' => 'nullable|array',
            'attribute_names.*' => 'required_with:attribute_values.*|string',
            'attribute_values' => 'nullable|array',
            'attribute_values.*' => 'required_with:attribute_names.*|string',
        ]);
        // echo '<pre>';
        // print_r($request->all());
        // die();

        if ($request->id) {
            $player = Player::find($request->id);
            if (!$player) {
                return redirect()->back()->with('error', 'Player not found.');
            }
        } else {
            $player = new Player;
        }
        

            $slug = Str::slug("{$request->first_name} {$request->last_name}"); // Adds space between first and last name

            $originalSlug = $slug;
            $count = 1;

            // Ensure `$player` is defined before using `$player->id`
            $existingPlayerId = isset($player) ? $player->id : null;

            while (Player::where('slug', $slug)->where('id', '!=', $existingPlayerId)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

        // Assign Data
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->banner_image_video = $request->banner_image_video;
        $player->slug = $slug;
        $player->twitter = $request->twitter;
        $player->instagram = $request->instagram;
        $player->facebook = $request->facebook;
        $player->height = $request->height;
        $player->weight = $request->weight;
        $player->dob = $request->dob;
        $player->jersey_number = $request->jersey_number;
        $player->email = $request->email;
        $player->phone = $request->phone;
        $player->high_school = $request->high_school;
        $player->class = $request->class;
        $player->graduation_year = $request->graduation_year;

        // Academics
        $player->gpa = $request->gpa;
        $player->sat_act_scores = $request->sat_act_scores;
        $player->academic_honors = $request->academic_honors;
        $player->academic_info = $request->academic_info;

        // Media
        $player->highlight_info = $request->highlight_info;
        $player->highlight_videos = json_encode(array_filter($request->highlight_videos ?? []));
        $player->game_footage_link = $request->game_footage_link;
        $player->photo_gallery_link = $request->photo_gallery_link;

        // Awards & Camps
        $player->award_info = $request->award_info;
        $player->team_mvp_award = $request->team_mvp_award;
        $player->all_state_honors = $request->all_state_honors;
        $player->athletic_camps_attended = $request->athletic_camps_attended;

        // Recruiting
        $player->recruting_info = $request->recruting_info;
        $player->commitment_status = $request->commitment_status;
        $player->offers_received = $request->offers_received;
        $player->preferred_colleges = $request->preferred_colleges;

        // Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Players/'), $imageName);
            $player->image = 'Players/' . $imageName;
        }

        // Banner Image / Video Upload
        // if ($request->hasFile('banner_image_video')) {
        //     $file = $request->file('banner_image_video');
        //     $fileNameBanner = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('Players/'), $fileNameBanner);
        //     $player->banner_image_video = 'Players/' . $fileNameBanner;
        // }

        $player->save();

        // Handling Custom Attributes
        if ($request->attribute_names && $request->attribute_values) {
            PlayerAttribute::where('player_id', $player->id)->delete();
            foreach ($request->attribute_names as $key => $attribute_name) {
                if (!empty($attribute_name) && !empty($request->attribute_values[$key])) {
                    PlayerAttribute::create([
                        'player_id' => $player->id,
                        'attribute_name' => $attribute_name,
                        'attribute_value' => $request->attribute_values[$key],
                    ]);
                }
            }
        }

        $message = $request->id ? 'Player updated successfully.' : 'Player added successfully.';
        return redirect()->back()->with('success', $message);
    }


    public function update(Request $request,$playerId){
        if($playerId){
            $positions = Position::all();

            $players = Player::where('id',$playerId)->first();
            if($players){
                return view('admin.players.update',compact('players','positions'));
            }
        }
        return redirect()->back()->with('error','players does not exist.');
    }

    public function remove(Request $request,$id){
        $player = Player::find($id);
    
        if ($player) {
            $player->delete();
            return redirect()->back()->with('success', 'player removed successfully.');
        } else {
            return redirect()->back()->with('error', 'player not found.');
        }
    }
    
}
