<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ResearchController as AdminResearchController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResearchController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index']);

// Frontend routes
Route::get('/blogs', function () {
    $blogs = \App\Models\Blog::with('category')->where('status', 'published')->latest()->paginate(12);
    return view('blogs.index', compact('blogs'));
})->name('blogs.index');

Route::get('/blogs/{blog:slug}', function (\App\Models\Blog $blog) {
    return view('blogs.show', compact('blog'));
})->name('blogs.show');

Route::get('/galleries', function () {
    $galleries = \App\Models\Gallery::with('category')->latest()->paginate(12);
    return view('galleries.index', compact('galleries'));
})->name('galleries.index');

Route::get('/galleries/{gallery}', function (\App\Models\Gallery $gallery) {
    return view('galleries.show', compact('gallery'));
})->name('galleries.show');

Route::get('/research', [ResearchController::class, 'index'])->name('research.index');
Route::get('/research/{research}', [ResearchController::class, 'show'])->name('research.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Test route for About functionality
Route::get('/test-about', function () {
    try {
        $about = \App\Models\About::first();
        return response()->json([
            'success' => true,
            'about'   => $about,
            'count'   => \App\Models\About::count(),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error'   => $e->getMessage(),
        ]);
    }
});

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Admin protected routes
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // About management
    Route::resource('abouts', AboutController::class);

    // Banner management
    Route::resource('banners', BannerController::class);

    // Blog management
    Route::resource('blogs', BlogController::class);
    Route::resource('blog-categories', BlogCategoryController::class);

    // Event management
    Route::resource('events', EventController::class);

    // Gallery management
    Route::resource('galleries', GalleryController::class);
    Route::resource('gallery-categories', GalleryCategoryController::class);

    // Research management
    Route::resource('researches', AdminResearchController::class);

    // Achievement management
    Route::resource('achievements', AchievementController::class);

    // Profile management
    Route::resource('profiles', ProfileController::class);

    // Contact messages
    Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

});
