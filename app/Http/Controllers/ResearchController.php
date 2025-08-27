<?php
namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\SocialMedia;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $researches  = Research::where('is_active', true)->latest()->paginate(12);
        $socialMedia = SocialMedia::first();
        return view('research.index', compact('researches', 'socialMedia'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        if (! $research->is_active) {
            abort(404);
        }

        // Get related researches (exclude current one)
        $relatedResearches = Research::where('is_active', true)
            ->where('id', '!=', $research->id)
            ->latest()
            ->take(3)
            ->get();

        $socialMedia = SocialMedia::first();

        return view('research.show', compact('research', 'relatedResearches', 'socialMedia'));
    }
}
