<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $researches = Research::latest()->paginate(10);
        return view('admin.researches.index', compact('researches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.researches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'long_description' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link'             => 'nullable|url',
            'is_active'        => 'boolean',
        ]);

        $data              = $request->all();
        $data['is_active'] = (bool) $request->input('is_active', 0);

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('researches', 'public');
            $data['image'] = $imagePath;
        }

        Research::create($data);

        return redirect()->route('admin.researches.index')->with('success', 'Research created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        return view('admin.researches.show', compact('research'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        return view('admin.researches.edit', compact('research'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'long_description' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link'             => 'nullable|url',
            'is_active'        => 'boolean',
        ]);

        $data              = $request->all();
        $data['is_active'] = (bool) $request->input('is_active', 0);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($research->image) {
                Storage::disk('public')->delete($research->image);
            }

            $imagePath     = $request->file('image')->store('researches', 'public');
            $data['image'] = $imagePath;
        }

        $research->update($data);

        return redirect()->route('admin.researches.index')->with('success', 'Research updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        if ($research->image) {
            Storage::disk('public')->delete($research->image);
        }

        $research->delete();

        return redirect()->route('admin.researches.index')->with('success', 'Research deleted successfully.');
    }
}
