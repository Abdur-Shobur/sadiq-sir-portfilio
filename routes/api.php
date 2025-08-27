<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Admin API Routes (Protected)
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    // Blog API
    Route::apiResource('blogs', BlogController::class);

    // Event API
    Route::apiResource('events', EventController::class);

    // Gallery API
    Route::apiResource('galleries', GalleryController::class);

    // Contact Messages API
    Route::get('messages', [ContactMessageController::class, 'index']);
    Route::get('messages/{message}', [ContactMessageController::class, 'show']);
    Route::delete('messages/{message}', [ContactMessageController::class, 'destroy']);
    Route::patch('messages/{message}/read', [ContactMessageController::class, 'markAsRead']);
    Route::patch('messages/{message}/unread', [ContactMessageController::class, 'markAsUnread']);
});

// Public API Routes
Route::get('blogs', function () {
    return App\Models\Blog::where('status', 'published')->with('category')->latest()->paginate(10);
});

Route::get('events', function () {
    return App\Models\Event::where('status', 'upcoming')->latest()->paginate(10);
});

Route::get('galleries', function () {
    return App\Models\Gallery::with('category')->latest()->paginate(12);
});
