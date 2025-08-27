<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Research;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'blogs'       => Blog::count(),
            'events'      => Event::count(),
            'messages'    => ContactMessage::count(),
            'subscribers' => Subscriber::count(),
            'galleries'   => Gallery::count(),
            'researches'  => Research::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentBlogs    = Blog::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentBlogs'));
    }
}
