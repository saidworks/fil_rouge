<?php

use App\Http\Livewire\Frontpage;
use App\Http\Livewire\ShowBooking;
use App\Http\Livewire\CreateBooking;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BootstrapFrontPage;
use App\Http\Controllers\BookingController;
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
                //annonces
                Route::get('/annonces',function(){
                    return view('admin.annonces');
                })->name('annonces');
                //dashboard
                Route::get('/dashboard',function(){
                    return view('dashboard');
                })->name('dashboard');
                //Pages / add middleware to register
                Route::get('/pages',function(){
                    return view('admin.pages');
                })->name('pages');
                // Route::get('/register',function(){
                //     return view('admin.pages');
                // })->name('register');
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
    });

// tailwind front to be developped further to learn more about this css framework
// Route::get('/{urlslug}', Frontpage::class);
// Route::get('/', Frontpage::class);

Route::get('/{urlslug}', BootstrapFrontpage::class);
Route::get('/', BootstrapFrontpage::class);
 
//Bookings
//problem in dashboard navbar and 
Route::get('/bookings/create',CreateBooking::class)->name('bookings.create');
Route::get('/bookings/{appointment:uuid}',ShowBooking::class)->name('bookings.show');
