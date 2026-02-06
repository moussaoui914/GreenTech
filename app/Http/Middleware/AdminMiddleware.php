<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = Auth::user();
        
        if ($user->role !== 'Admin') {
            return redirect()->route('homePage')->with('error', 'Accès réservé aux administrateurs.');
        }

        return $next($request);
    }
}