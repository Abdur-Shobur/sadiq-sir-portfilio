<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('admin.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'period'      => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link'        => 'nullable|url',
            'is_active'   => 'boolean',
        ]);

        $data              = $request->all();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('achievements', 'public');
            $data['image'] = $imagePath;
        }

        Achievement::create($data);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        return view('admin.achievements.show', compact('achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'period'      => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link'        => 'nullable|url',
            'is_active'   => 'boolean',
        ]);

        $data              = $request->all();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($achievement->image) {
                Storage::disk('public')->delete($achievement->image);
            }
            $imagePath     = $request->file('image')->store('achievements', 'public');
            $data['image'] = $imagePath;
        }

        $achievement->update($data);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        // Delete image if exists
        if ($achievement->image) {
            Storage::disk('public')->delete($achievement->image);
        }

        $achievement->delete();

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement deleted successfully.');
    }
}
