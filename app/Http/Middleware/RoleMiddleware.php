<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ এই লাইনটি যোগ করা হয়েছে
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // ✅ নিচের কোডটি পরিবর্তন করা হয়েছে

        // নিশ্চিত করুন ইউজার লগইন করা আছে এবং তার রোলটি অনুমোদিত রোলের মধ্যে আছে
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            // সাধারণ পদ্ধতিতে abort ফাংশন কল করা হয়েছে
            abort(403, 'Unauthorized Action.');
        }

        return $next($request);
    }
}