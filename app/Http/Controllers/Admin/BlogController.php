<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt'          => 'nullable|string|max:500',
            'status'           => 'required|in:published,draft',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('blogs', 'public');
            $data['image'] = $imagePath;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt'          => 'nullable|string|max:500',
            'status'           => 'required|in:published,draft',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $imagePath     = $request->file('image')->store('blogs', 'public');
            $data['image'] = $imagePath;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
