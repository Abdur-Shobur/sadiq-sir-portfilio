<?php
namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Achievement;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Profile;
use App\Models\Research;
use App\Models\SocialMedia;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'banner'       => Banner::first(),
            'about'        => About::first(),
            'profile'      => Profile::first(),
            'blogs'        => Blog::with('category')->where('status', 'published')->latest()->take(3)->get(),
            'events'       => Event::latest()->take(5)->get(),
            'galleries'    => Gallery::with('category')->latest()->take(8)->get(),
            'researches'   => Research::where('is_active', true)->latest()->take(4)->get(),
            'achievements' => Achievement::latest()->take(4)->get(),
            'socialMedia'  => SocialMedia::first(),
        ];

        return view('home', $data);
    }
}
