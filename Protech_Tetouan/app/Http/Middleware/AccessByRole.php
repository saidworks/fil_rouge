<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AccessByRole
{
    // dashboard,navigation-menus, pages , ?register?
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        echo 'the middleware for access control is running <br>';
        $userRole = auth()->user()->role;
        $currentRoute = Route::currentRouteName();
        echo $userRole;
        echo "<br>".$currentRoute;
        exit;
        return $next($request);
    }
    private function  userAccessRole(){
        
    }
}
