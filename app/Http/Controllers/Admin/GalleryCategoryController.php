<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::withCount('galleries')->orderBy('name')->paginate(10);
        return view('admin.gallery-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:gallery_categories',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = (bool) $request->input('is_active', 0);

        GalleryCategory::create([
            'name'        => $data['name'],
            'slug'        => Str::slug($data['name']),
            'description' => $data['description'],
            'is_active'   => $data['is_active'],
        ]);

        return redirect()->route('admin.gallery-categories.index')
            ->with('success', 'Gallery category created successfully.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery-categories.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:gallery_categories,name,' . $galleryCategory->id,
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = (bool) $request->input('is_active', 0);

        $galleryCategory->update([
            'name'        => $data['name'],
            'slug'        => Str::slug($data['name']),
            'description' => $data['description'],
            'is_active'   => $data['is_active'],
        ]);

        return redirect()->route('admin.gallery-categories.index')
            ->with('success', 'Gallery category updated successfully.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        // Check if category has gallery items
        if ($galleryCategory->galleries()->count() > 0) {
            return redirect()->route('admin.gallery-categories.index')
                ->with('error', 'Cannot delete category that has gallery items. Please reassign or delete the gallery items first.');
        }

        $galleryCategory->delete();

        return redirect()->route('admin.gallery-categories.index')
            ->with('success', 'Gallery category deleted successfully.');
    }
}
