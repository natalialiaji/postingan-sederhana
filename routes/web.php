<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
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

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => "home",
    ]);
});


Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "active" => "about",
        "nama" => "Rahmat",
        "profesi" => "Programmer WEB Front End",
        "hobi" => "Gamers"
    ]);
});

Route::get('/posts', [Postcontroller::class,'index']);
route::get('/posts/{post:slug}', [PostController::class,'show']);
Route::get('/categories', [CategoryController::class,'index']);

Route::get('/login', [LoginController::class,'index'])->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/create', [DashboardPostController::class,'create'])->middleware('auth');
// Route::post('/dashboard/posts/store', [DashboardPostController::class,'store'])->middleware('auth');
// /dashboard/post/create 