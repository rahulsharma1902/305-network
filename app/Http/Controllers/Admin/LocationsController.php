<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Location};
use DB;
use Illuminate\Validation\Rule;
class LocationsController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index',compact('locations'));
    }
    public function add(Request $request){
        return view('admin.locations.add');
    }
    public function addProcc(Request $request, $id = null) {
        $request->validate([
            'name' => 'required|string|unique:locations,name,' . ($id ?? 'NULL') . ',id',
            'slug' => 'required|string|unique:locations,slug,' . ($id ?? 'NULL') . ',id',
        ]);
    
        $location = $id ? Location::findOrFail($id) : new Location;
    
        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->save();
    
        $message = $id ? 'Location updated successfully.' : 'Location added successfully.';
    
        return redirect()->back()->with('success', $message);
    }
    
    public function update(Request $request,$locationId){
        if($locationId){
            $location = Location::where('id',$locationId)->first();
            if($location){
                return view('admin.locations.update',compact('location'));
            }
        }
        return redirect()->back()->with('error','Location does not exist.');
    }
    public function remove(Request $request,$id){
        $location = Location::find($id);
    
        if ($location) {
            $location->delete();
            return redirect()->back()->with('success', 'location removed successfully.');
        } else {
            return redirect()->back()->with('error', 'location not found.');
        }
    }
}
