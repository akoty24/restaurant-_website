<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            if ($request->user()->type == 1) {
                return $next($request);
            } else {
                return redirect()->route('index')->with('message','You do not have any permission to access this page');
            }
        } else {
            return redirect()->route('login')->with('message','login to access the website info');
        }
    }
}
