<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->paginate(10);
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['email', 'phone', 'address']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath     = $request->file('logo')->store('profiles', 'public');
            $data['logo'] = $logoPath;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('profiles', 'public');
            $data['image'] = $imagePath;
        }

        Profile::create($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile created successfully.');
    }

    public function show(Profile $profile)
    {
        return view('admin.profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['email', 'phone', 'address']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $logoPath     = $request->file('logo')->store('profiles', 'public');
            $data['logo'] = $logoPath;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $imagePath     = $request->file('image')->store('profiles', 'public');
            $data['image'] = $imagePath;
        }

        $profile->update($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile)
    {
        // Delete associated files
        if ($profile->logo) {
            Storage::disk('public')->delete($profile->logo);
        }
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }

        $profile->delete();

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile deleted successfully.');
    }
}
