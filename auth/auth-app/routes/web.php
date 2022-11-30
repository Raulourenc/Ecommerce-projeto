<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SpecificProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Login;
use App\Models\User;

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

Route::get('/Welcome', function (Request $request) {
        
        session_start();
        $_SESSION['rota'] = Route('welcome');


        $user = User::all()->where('email', $_SESSION['email']);
        foreach($user as $add){
        }
        $ad = $add->getAttributes();
        $a = $ad['id'];

        $_SESSION['id'] = $a;

       
        $search = $request->input('search_');
        if($search != ""){
            $products = Products::where('name', 'LIKE', "%$search%")->paginate(8);
        } else {
            $products = Products::paginate(8);
        }

      
        $check = User::all()->where('admin', true);
        $checked = $check->pluck('email');
        foreach($checked as $mail){

            if($mail == $_SESSION['email']){
                $_SESSION['prod'] = true;
                return view('welcome', compact('products'));
            }
        }
        
        return view('home', compact('products'));
      
        

})->name('welcome')->middleware('auth');




Route::get('logout', function (Request $request) {

    session_start();

    $_SESSION['prod'] = false;
    $_SESSION['email'] = false;
    $_SESSION['id'] = false;

    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('index');

})->name('logout')->middleware('auth');


Route::resource('/', LoginController::class);
Route::resource('Products', ProductsController::class);
Route::resource('Address', AddressController::class);
Route::resource('Add', AddController::class);
Route::resource('Category', CategoryController::class);
