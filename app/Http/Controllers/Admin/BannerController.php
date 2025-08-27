<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'subtitle'        => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'additional_text' => 'nullable|string',
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active'       => 'boolean',
            'order'           => 'nullable|integer|min:0',
        ]);

        $data              = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['order']     = $request->order ?? 0;

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('banners', 'public');
            $data['image'] = $imagePath;
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        // Log the banner data for debugging
        Log::info('Banner edit request', [
            'banner_id'    => $banner->id,
            'banner_title' => $banner->title,
            'banner_data'  => $banner->toArray(),
        ]);

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        try {
            // Log the request data for debugging
            Log::info('Banner update request', [
                'banner_id'    => $banner->id,
                'request_data' => $request->all(),
                'has_file'     => $request->hasFile('image'),
            ]);

            $request->validate([
                'title'           => 'required|string|max:255',
                'subtitle'        => 'nullable|string|max:255',
                'description'     => 'nullable|string',
                'additional_text' => 'nullable|string',
                'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_active'       => 'nullable|in:on,1,true',
                'order'           => 'nullable|integer|min:0',
            ]);

            $data              = $request->all();
            $data['is_active'] = $request->has('is_active');
            $data['order']     = $request->order ?? 0;

            // Log the data before update
            Log::info('Banner update data', [
                'banner_id'   => $banner->id,
                'update_data' => $data,
            ]);

            if ($request->hasFile('image')) {
                // Delete old image
                if ($banner->image) {
                    Storage::disk('public')->delete($banner->image);
                }

                $imagePath     = $request->file('image')->store('banners', 'public');
                $data['image'] = $imagePath;
            }

            // Log before the actual update
            Log::info('About to update banner', [
                'banner_id' => $banner->id,
                'current_title' => $banner->title,
                'new_title' => $data['title']
            ]);

            $result = $banner->update($data);

            // Log the result
            Log::info('Banner update result', [
                'banner_id' => $banner->id,
                'update_result' => $result,
                'updated_banner' => $banner->fresh()->toArray()
            ]);

            // Log successful update
            Log::info('Banner updated successfully', [
                'banner_id' => $banner->id,
            ]);

            return redirect()->route('admin.banners.index')
                ->with('success', 'Banner updated successfully.');

        } catch (\Exception $e) {
            // Log any exceptions
            Log::error('Banner update failed', [
                'banner_id' => $banner->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update banner: ' . $e->getMessage()]);
        }
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
