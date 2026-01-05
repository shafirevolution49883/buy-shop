<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemoMode
{
    public function handle(Request $request, Closure $next)
    {
        // শুধু demo mode ON থাকলে
        if (env('APP_DEMO', false) === true) {

            // শুধু admin routes apply হবে
            if ($request->is('admin/*')) {

                // POST, PUT, PATCH, DELETE block
                if ($request->isMethod('post') || $request->isMethod('put') || 
                    $request->isMethod('patch') || $request->isMethod('delete')) {
                    return redirect()->back()->with('error', 'This action is disabled in demo mode.');
                }

                // GET action url block (optional)
                if ($request->is('admin/*/delete*') || $request->is('admin/*/remove*') || 
                    $request->is('admin/*/edit*') || $request->is('admin/*/update*') || 
                    $request->is('admin/*/activate*') || $request->is('admin/*/deactivate*')) {
                    return redirect()->back()->with('error', 'This action is disabled in demo mode.');
                }
            }
        }

        return $next($request);
    }
}
