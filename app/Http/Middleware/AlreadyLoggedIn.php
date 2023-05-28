<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure(Request): (RedirectResponse)  $next
     * @return RedirectResponse
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        if (Auth::check()) {
            return redirect()->route('home')->with('success', __('messages.logged_in'));
        }

        return $next($request);
    }
}
