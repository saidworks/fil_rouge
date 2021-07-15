<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $fillable = ['route','route_name'];    
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
            'reservations'
        ];

    }
}
