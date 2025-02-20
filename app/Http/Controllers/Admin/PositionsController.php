<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Position,Sport};
use DB;
use Illuminate\Validation\Rule;
class PositionsController extends Controller
{
   
    public function index()
    {
        $positions = Position::all();
        return view('admin.positions.index',compact('positions'));
    }
    public function add(Request $request){
        $sports = Sport::all();
        return view('admin.positions.add',compact('sports'));
    }
    public function addProcc(Request $request, $id = null) {
        $request->validate([
            'name' => 'required|string|unique:positions,name,' . ($id ?? 'NULL') . ',id',
            'short_code' => 'required|string',
            'category' => 'required|in:player,coach', 
            'description' => 'nullable|string',
            'sport_id' => 'nullable|exists:sports,id'
        ]);
        
    
        $positions = $id ? Position::findOrFail($id) : new Position;
    
        $positions->name = $request->name;
        $positions->short_code = $request->short_code;
        $positions->description = $request->description;
        $positions->category = $request->category;
        $positions->sport_id = $request->sport_id;
        $positions->save();
    
        $message = $id ? 'Position updated successfully.' : 'positions added successfully.';
    
        return redirect()->back()->with('success', $message);
    }
    
    public function update(Request $request,$positionsId){
        $sports = Sport::all();
        if($positionsId){
            $positions = Position::where('id',$positionsId)->first();
            if($positions){
                return view('admin.positions.update',compact('positions','sports'));
            }
        }
        return redirect()->back()->with('error','position does not exist.');
    }
    public function remove(Request $request,$id){
        $positions = Position::find($id);
    
        if ($positions) {
            $positions->delete();
            return redirect()->back()->with('success', 'position removed successfully.');
        } else {
            return redirect()->back()->with('error', 'position not found.');
        }
    }
}
