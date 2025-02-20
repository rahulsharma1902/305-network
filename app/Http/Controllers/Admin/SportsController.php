<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sport,SportAttribute};
use DB;
use Illuminate\Validation\Rule;
class SportsController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('admin.sports.index',compact('sports'));
        // return view('admin.sports.index');
    }
    public function add(Request $request){
        return view('admin.sports.add');
    }
    public function addProcc(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|unique:sports,name,' . ($request->id ?? 'NULL') . ',id',
            'slug' => 'required|string|unique:sports,slug,' . ($request->id ?? 'NULL') . ',id', 
            'type' => 'required|in:men,women', 
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:3048',
            'icon' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url', 
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url', 
            'ticketmaster' => 'nullable|url', 
        ]);

        if ($request->id) {
            $sport = Sport::where('id', $request->id)->first();
            if (!$sport) {
                return redirect()->back()-with('error','Sport not found.');
            }
        } else {
            $sport = new Sport;
        }
        

        $sport->name = $request->name;
        $sport->slug = $request->slug;
        $sport->type = $request->type;
        $sport->facebook = $request->facebook;
        $sport->instagram = $request->instagram;
        $sport->twitter = $request->twitter;
        $sport->ticketmaster = $request->ticketmaster;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = $request->slug . '-' . time() . '.' . $imageExtension;
            $image->move(public_path('Sports/Images/'), $imageName);
            $sport->image = 'Sports/Images/' . $imageName; 
        }

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconExtension = $icon->getClientOriginalExtension();
            $iconName = $request->slug . '-icon-' . time() . '.' . $iconExtension;
            $icon->move(public_path('Sports/Icons/'), $iconName);
            $sport->icon = 'Sports/Icons/' . $iconName; 

        }

        $sport->save();

        $message = $request->id ? 'Sport updated successfully.' : 'Sport added successfully.';
    
        return redirect()->back()->with('success', $message);
    }

    public function update(Request $request,$sportId){
        if($sportId){
            $sports = Sport::where('id',$sportId)->first();
            if($sports){
                return view('admin.sports.update',compact('sports'));
            }
        }
        return redirect()->back()->with('error','Sports does not exist.');
    }

    public function remove(Request $request,$id){
        $sport = Sport::find($id);
    
        if ($sport) {
            $sport->delete();
            return redirect()->back()->with('success', 'sport removed successfully.');
        } else {
            return redirect()->back()->with('error', 'sport not found.');
        }
    }

    // public function attributes(Request $request , $sportId){
    //     $sport = Sport::where('id',$sportId)->first();
    //     if($sport){
            
    //         return view('admin.sports.attributes',compact('sport'));
    //     }
    // }
    public function attributes($sportId)
    {
        $sport = Sport::with('attributes')->where('id',$sportId)->first();
        // print_r($sport);
        // die();
        return view('admin.sports.attributes', compact('sport'));
    }
    // public function storeAttributes(Request $request)
    // {
    //     echo '<pre>';
    //     print_r($request->all()); 
    // die();
    //     $request->validate([
    //         'sport_id' => 'required|exists:sports,id',
    //         'attributes' => 'nullable|array',
    //         'attributes.*' => 'string|max:255',
    //     ]);

    
    //     $existing_attributes = $request->input('existing_attributes', []); 
    //     foreach ($existing_attributes as $attr) {
    //         $sportExs = SportAttribute::where('id',$attr->id)->first();
    //         if($sportExs){
    //             // $sportExs->sport_id = $request->sport_id;
    //             $sportExs->attribute_name = $attr->attribute_name;
    //             $sportExs->save();
    //         }
    //     }
        
    //     $attributes = $request->input('attributes', []);    
    //     foreach ($attributes as $attribute) {
    //         $sportAttr = new SportAttribute;
    //         $sportAttr->sport_id = $request->sport_id;
    //         $sportAttr->attribute_name = $attribute;
    //         $sportAttr->save();
    //     }
    
    //     return redirect()->back()->with('success', 'attribute added successfully.');

    // }
    

    public function storeAttributes(Request $request)
    {
        $request->validate([
            'sport_id' => 'required|exists:sports,id',
            'attributes' => 'nullable|array',
            'attributes.*' => 'required|string|max:255', // Prevents null attributes
            'existing_attributes' => 'nullable|array',
            'existing_attributes.*.id' => 'required|exists:sport_attributes,id',
            'existing_attributes.*.attribute_name' => 'required|string|max:255',
        ]);
    
        // Update existing attributes
        $existing_attributes = $request->input('existing_attributes', []); 
        foreach ($existing_attributes as $attr) {
            $sportExs = SportAttribute::find($attr['id']); // Fix: Use array keys
            if ($sportExs) {
                $sportExs->attribute_name = $attr['attribute_name'];
                $sportExs->save();
            }
        }
    
        // Add new attributes
        $attributes = $request->input('attributes', []);    
        foreach ($attributes as $attribute) {
            SportAttribute::create([
                'sport_id' => $request->sport_id,
                'attribute_name' => $attribute,
            ]);
        }
    
        return redirect()->back()->with('success', 'Attributes updated successfully.');
    }
    

}
