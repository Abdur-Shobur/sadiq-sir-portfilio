<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title'       => 'required|string|max:255',
                'subtitle'    => 'required|string|max:255',
                'description' => 'required|string',
                'image1'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image2'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_active'   => 'boolean',
            ]);

            $data              = $request->all();
            $data['is_active'] = $request->boolean('is_active');

            if ($request->hasFile('image1')) {
                $imagePath      = $request->file('image1')->store('abouts', 'public');
                $data['image1'] = $imagePath;
            }

            if ($request->hasFile('image2')) {
                $imagePath      = $request->file('image2')->store('abouts', 'public');
                $data['image2'] = $imagePath;
            }

            About::create($data);

            return redirect()->route('admin.abouts.index')
                ->with('success', 'About section created successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors and try again.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create about section. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        try {
            $request->validate([
                'title'       => 'required|string|max:255',
                'subtitle'    => 'required|string|max:255',
                'description' => 'required|string',
                'image1'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image2'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_active'   => 'boolean',
            ]);

            $data              = $request->all();
            $data['is_active'] = $request->boolean('is_active');

            if ($request->hasFile('image1')) {
                // Delete old image
                if ($about->image1) {
                    Storage::disk('public')->delete($about->image1);
                }
                $imagePath      = $request->file('image1')->store('abouts', 'public');
                $data['image1'] = $imagePath;
            }

            if ($request->hasFile('image2')) {
                // Delete old image
                if ($about->image2) {
                    Storage::disk('public')->delete($about->image2);
                }
                $imagePath      = $request->file('image2')->store('abouts', 'public');
                $data['image2'] = $imagePath;
            }

            $about->update($data);

            return redirect()->route('admin.abouts.index')
                ->with('success', 'About section updated successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors and try again.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update about section. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        try {
            if ($about->image1) {
                Storage::disk('public')->delete($about->image1);
            }
            if ($about->image2) {
                Storage::disk('public')->delete($about->image2);
            }

            $about->delete();

            return redirect()->route('admin.abouts.index')
                ->with('success', 'About section deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.abouts.index')
                ->with('error', 'Failed to delete about section. Please try again.');
        }
    }
}
