<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserPermission extends Model
{
    use HasFactory;
    protected $fillable = ['role','route_name'];    
    /**
     * routeNameList 
     *  List of the routes in the website when authenticated
     * @return void
     */
    public static function routeNameList(){
        return [
            'pages',
            'navigation-menus',
            'users',
            'user-permissions',
            'dashboard',
            'products',
            'services',
            'bookings.create',
            'annonces',
            'appointments'
        ];

    }    
    /**
     * Checks if the current usr role has access to a specific route
     *
     * @param  mixed $userRole
     * @param  mixed $routeName
     * @return void
     */
    public static function isRoleHasRightToAccess($userRole,$routeName){
        try{
            $model = static::where('role',$userRole)
            ->where('route_name',$routeName)
            ->first();
            return $model ? true : false; 
        }
        catch(\Throwable $th){

        }
    }
}
