<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')->orderBy('name')->paginate(10);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:blog_categories',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
        ]);

        $data              = $request->all();
        $data['is_active'] = (bool) $request->input('is_active', 0);

        BlogCategory::create([
            'name'        => $data['name'],
            'slug'        => Str::slug($data['name']),
            'description' => $data['description'],
            'is_active'   => $data['is_active'],
        ]);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Blog category created successfully.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:blog_categories,name,' . $blogCategory->id,
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
        ]);

        $data              = $request->all();
        $data['is_active'] = (bool) $request->input('is_active', 0);

        $blogCategory->update([
            'name'        => $data['name'],
            'slug'        => Str::slug($data['name']),
            'description' => $data['description'],
            'is_active'   => $data['is_active'],
        ]);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Blog category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        // Check if category has blogs
        if ($blogCategory->blogs()->count() > 0) {
            return redirect()->route('admin.blog-categories.index')
                ->with('error', 'Cannot delete category that has blog posts. Please reassign or delete the blog posts first.');
        }

        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Blog category deleted successfully.');
    }
}
