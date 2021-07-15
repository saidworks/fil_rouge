<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

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
        try
        {
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();
            if(in_array($currentRouteName,$this->userAccessRole()[$userRole])){
                return $next($request);
            }
            else{
                abort(403,'Unauthorized access');
            }
        }
        
        catch(\Throwable $th){
            abort(403,'Unauthorized access');
        }
        
    }    
    /**
     * The list of accessible ressources for a specific user
     * this will be stored in database later
     * @return void
     */
    private function  userAccessRole(){
        return [
            'user' => [
                'dashboard',
                'reservations'
                        ],
            'admin' => [
                'pages',
                'navigation-menus',
                'users',
                'user-permissions',
                'dashboard',
                'products',
                'services',
                'reservations'
            ]
        ];
    }
}
