<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{News,MultimediaNews,Player};
class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('multimediaNews')->get();
        return view('admin.news.index',compact('news'));

    }
    public function add(Request $request){
        $players = Player::all();
        return view('admin.news.add',compact('players'));
    }
    public function addProcc(Request $request)
    {

// dd($request->all());
$request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'author_name' => 'required|string|max:100',
    'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
    'tag_player' => 'required|array', // Ensure tag_player is an array
    'tag_player.*' => 'exists:players,id', // Validate each player ID exists
    'date' => 'nullable|date', // Validate as a date
]);


        $news = $request->news_id ? News::find($request->news_id) : new News;

        if (!$news) {
            return redirect()->back()->with('error', 'News not found.');
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->author_name = $request->author_name;
        $news->tag_player = $request->tag_player;
        $news->date = $request->date ?? now();
        $news->save();

        // If updating, delete old images
        if ($request->news_id) {
            MultimediaNews::where('news_id', $news->news_id)->delete();
        }

        // Store new images if uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name
                $image->move(public_path('uploads/news'), $imageName); // Save image to public/uploads/news

                MultimediaNews::create([
                    'news_id' => $news->id,
                    'images' => 'uploads/news/' . $imageName, // Store path in DB
                ]);
            }
        }


        $message = $request->news_id ? 'News updated successfully.' : 'News added successfully.';
        return redirect()->route('admin.news.index')->with('success', $message);

    }

    public function update(Request $request,$newsId){
        if($newsId){
            $news = News::with('images')->where('id', $newsId)->first();
            $players = Player::all();
            if($news){
                return view('admin.news.update',compact('news','players'));
            }
        }
        return redirect()->back()->with('error','teams does not exist.');
    }

    public function deleteImage(Request $request)
{
    $image = MultimediaNews::findOrFail($request->image_id);

    // Delete the file from the public folder
    if (file_exists(public_path($image->images))) {
        unlink(public_path($image->images));
    }

    // Remove record from DB
    $image->delete();

    return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
}
public function remove(Request $request,$id){
    $news = News::find($id);

    if ($news) {
        $news->delete();
        return redirect()->back()->with('success', 'coache removed successfully.');
    } else {
        return redirect()->back()->with('error', 'coache not found.');
    }
}

}
