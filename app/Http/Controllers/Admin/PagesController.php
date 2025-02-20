<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{HomePage,HomePageMedia,HeaderPage,FooterPage};
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        $homePage = HomePage::with('bannerSliders','matchHighlights','matchNotifications','newsTickerContents')
        ->first();
        return view('admin.pages.home.index', compact('homePage'));
    }

    public function homeAddProcc(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die();
        $validated = $request->validate([
            'advertisement_banner_image' => 'nullable|image',
            'news_ticker_title' => 'nullable|string|max:255',
            'news_ticker_content' => 'nullable|array',
            'news_ticker_content.*' => 'nullable|string|max:5000',
            'banner_sliders.*' => 'nullable|image',
            'match_highlight_video.*' => 'nullable|url',
            'match_notifications_banner.*' => 'nullable|image',
        ]);

        // Retrieve the current HomePage record or create a new one if it doesn't exist
        $homePage = HomePage::first() ?? new HomePage();
        $homePage->news_ticker_title = $request->news_ticker_title;
      
        // Handle Advertisement Banner Image (Update/Delete)
        if ($request->hasFile('advertisement_banner_image')) {
            $image = $request->file('advertisement_banner_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Pages/Home/advertisements/'), $imageName);
            $homePage->advertisement_banner_image = 'Pages/Home/advertisements/' . $imageName;
        } elseif ($request->input('remove_advertisement_banner')) {
            // Remove image if requested
            if ($homePage->advertisement_banner_image) {
                unlink(public_path($homePage->advertisement_banner_image));
            }
            $homePage->advertisement_banner_image = null;
        }

        $homePage->save();
        if ($request->has('delete_items')) {
            HomePageMedia::whereIn('id', $request->input('delete_items'))->delete();
        }        
        // Handle News Ticker Content
        if ($request->has('news_ticker_content')) {
            HomePageMedia::where('home_page_id', $homePage->id)
                ->where('type', 'news_ticker_content')
                ->delete();

            foreach ($request->news_ticker_content as $newsTickerContent) {
                if ($newsTickerContent) {
                    HomePageMedia::create([
                        'home_page_id' => $homePage->id,
                        'type' => 'news_ticker_content',
                        'title' => $newsTickerContent,
                    ]);
                }
            }
        }


        if ($request->hasFile('banner_sliders')) {
            foreach ($request->file('banner_sliders') as $file) {
                if ($file) {
                    $imageName = uniqid() .time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('Pages/Home/banner_sliders/'), $imageName);
                    HomePageMedia::create([
                        'home_page_id' => $homePage->id,
                        'type' => 'banner_slider',
                        'image' => 'Pages/Home/banner_sliders/' . $imageName,
                    ]);
                }
            }
        }
        // Handle Match Notifications
        if ($request->hasFile('match_notifications_banner')) {
            foreach ($request->file('match_notifications_banner') as $file) {
                if ($file) {
                    $imageName = uniqid() .time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('Pages/Home/match_notifications/'), $imageName);
                    HomePageMedia::create([
                        'home_page_id' => $homePage->id,
                        'type' => 'match_notification',
                        'image' => 'Pages/Home/match_notifications/' . $imageName,
                    ]);
                }
            }
        }
        // Handle Match Highlights (Only remove if new URLs exist)
        HomePageMedia::where('type','match_highlight_video')->delete();
        if ($request->has('match_highlight_video')) {
            foreach ($request->match_highlight_video as $videoUrl) {
                if ($videoUrl) {
                    HomePageMedia::create([
                        'home_page_id' => $homePage->id,
                        'type' => 'match_highlight_video',
                        'video_url' => $videoUrl,
                    ]);
                }
            }
        }

        

        return redirect()->back()->with('success', 'Home Page Content Updated!');
    }

    public function header(Request $request)
    {
        $headerPage = HeaderPage::first();
        return view('admin.pages.header.index',compact('headerPage'));
    }
    public function headerAddProcc(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die();
        $validated = $request->validate([
            'breaking_text' => 'required|string|max:255',            
            'news_label' => 'required|string|max:255',            
            'news_ticker_text' => 'required|string|max:255',            
            'news_ticker_link' => 'nullable|url',
        ]);

        $headerPage = HeaderPage::first() ?? new HeaderPage();
        $headerPage->breaking_text = $request->breaking_text;
        $headerPage->news_label = $request->news_label;
        $headerPage->news_ticker_text = $request->news_ticker_text;
        $headerPage->news_ticker_link = $request->news_ticker_link;
        $headerPage->save();
      
        return redirect()->back()->with('success', 'Header Content Updated!');
    }

    // for footer 
    public function footer(Request $request)
    {
        $footerPage = FooterPage::first();
        return view('admin.pages.footer.index',compact('footerPage'));
    }
    public function footerAddProcc(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string|max:255',            
            'email' => 'nullable|string|max:255',            
            'phone' => 'nullable|string|max:255',            
            'description_title' => 'nullable|string|max:255',            
            'description' => 'nullable|string',            
        ]);

        $headerPage = FooterPage::first() ?? new FooterPage();
        $headerPage->address = $request->address;
        $headerPage->email = $request->email;
        $headerPage->phone = $request->phone;
        $headerPage->description = $request->description;
        $headerPage->description_title = $request->description_title;
        $headerPage->save();
      
        return redirect()->back()->with('success', 'Footer Content Updated!');
    }

    

}
