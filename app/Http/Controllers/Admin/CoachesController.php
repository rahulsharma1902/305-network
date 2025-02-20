<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,Position,Coache};
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CoachesController extends Controller
{
    public function index()
    {
        $coaches = Coache::all();
        return view('admin.coaches.index',compact('coaches'));
        // return view('admin.coaches.index');
    }
    public function add(Request $request){
        $positions = Position::all();
        return view('admin.coaches.add',compact('positions'));
    }
    public function addProcc(Request $request)
    {
        // Validate input (removed 'slug' validation)
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:3048',
            'twitter' => 'nullable|url', 
            'facebook' => 'nullable|url', 
            'instagram' => 'nullable|url', 
            'bio' => 'nullable', 
            'career_record' => 'nullable', 
            'postseason_appearances' => 'nullable', 
            'position_id' => 'required|exists:positions,id',
            'email' => 'required|string', 
            'title' => 'required|string', 
            'phone' => 'required|string', 
        ]);
    
        $coach = Coache::find($request->id) ?? new Coache;
    
        $slug = Str::slug($request->name);
    
        $originalSlug = $slug;
        $count = 1;
        while (Coache::where('slug', $slug)->where('id', '!=', $coach->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
    
        // Assign values
        $coach->name = $request->name;
        $coach->slug = $slug;
        $coach->email = $request->email;
        $coach->title = $request->title;
        $coach->phone = $request->phone;
        $coach->bio = $request->bio;
        $coach->career_record = $request->career_record;
        $coach->postseason_appearances = $request->postseason_appearances;
        $coach->position_id = $request->position_id;
        $coach->twitter = $request->twitter;
        $coach->facebook = $request->facebook;
        $coach->instagram = $request->instagram;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = $slug . '-' . time() . '.' . $imageExtension;
            $image->move(public_path('Coaches/Images/'), $imageName);
            $coach->image = 'Coaches/Images/' . $imageName; 
        }
    
        $coach->save();
    
        // Success message
        $message = $request->id ? 'Coach updated successfully.' : 'Coach added successfully.';
        return redirect()->back()->with('success', $message);
    }
    public function update(Request $request,$coacheId){
        if($coacheId){
            $positions = Position::all();

            $coaches = Coache::where('id',$coacheId)->first();
            if($coaches){
                return view('admin.coaches.update',compact('coaches','positions'));
            }
        }
        return redirect()->back()->with('error','coaches does not exist.');
    }
    public function remove(Request $request,$id){
        $coaches = Coache::find($id);
    
        if ($coaches) {
            $coaches->delete();
            return redirect()->back()->with('success', 'coache removed successfully.');
        } else {
            return redirect()->back()->with('error', 'coache not found.');
        }
    }
}
