<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // $user = $request->user();

        // // if(strcmp($user->role, $role)!=0){
        // //     return back()->with('Error','Only an administrator can perform this action.');
        // // }

        // if(strcmp($role == 'admin', auth()->user()->role != 'admin')){
        //     return back()->with('Error','Only an administrator can perform this action.');

        // }
        $user = $request->user();

        if ($role == 'admin' && auth()->user()->role != 'admin' ) {
            return back()->with('Error', 'Only an admin can perform this action.');
        }
        // if ($role == 'user' && auth()->user()->role != 'user' ) {
        //   return
        // }
        if ($role == 'editor' && auth()->user()->role != 'editor' ) {
            return back()->with('Error', 'Only an editor can perform this action.');
        }
        return $next($request);
    }
}
