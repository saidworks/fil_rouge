<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontpage;
use App\Http\Livewire\BootstrapFrontPage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::middleware(['auth:sanctum', 'verified','accessrole'])
//     ->get('/dashboard', function () {return view('dashboard'); })->name('dashboard');

Route::group(['middleware' => ['auth:sanctum','verified','accessrole']], function(){
                //dashboard
                Route::get('/dashboard',function(){
                    return view('dashboard');
                })->name('dashboard');
                //Pages / add middleware to register
                Route::get('/pages',function(){
                    return view('admin.pages');
                })->name('pages');
                Route::get('/register',function(){
                    return view('admin.pages');
                })->name('register');
                //Navigation menus
                Route::get('/navigation-menus',function(){
                    return view('admin.navigation-menus');
                })->name('navigation-menus');
                // Users 
                Route::get('/users',function(){
                    return view('admin.users');
                })->name('users');
                Route::get('/user-permissions',function(){
                    return view('admin.user-permissions');
                })->name('user-permissions');
                Route::get('/products',function(){
                    return view('admin.products');
                })->name('products');
                Route::get('/services',function(){
                    return view('admin.services');
                })->name('services');
                
    }
    );


    // Route::get('/{urlslug}', Frontpage::class);
    // Route::get('/', Frontpage::class);

    Route::get('/{urlslug}', BootstrapFrontpage::class);
    Route::get('/', BootstrapFrontpage::class);

