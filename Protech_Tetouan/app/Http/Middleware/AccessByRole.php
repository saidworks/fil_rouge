<?php

namespace App\Http\Middleware;

use App\Models\UserPermission;
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
            if( UserPermission::isRoleHasRightToAccess($userRole,$currentRouteName)
                || in_array($currentRouteName,$this->userAccessRole()[$userRole])){
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
     * the default user access role for the admin
     * in case all our user permissions in db are lost
     * @return void
     */
    private function  userAccessRole(){
        return [
            'admin' => [
                'user-permissions',
            ]
        ];
    }
}
