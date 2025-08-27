<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        if ($user->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'You do not have admin privileges.',
            ]);
        }

        return $next($request);
    }
}
