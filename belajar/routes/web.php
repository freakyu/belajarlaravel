<?php

use Illuminate\Support\Facades\Route;
use App\Models\Posts; //Agar dapat menggunakan model di route
use App\Models\Category;    //Agar dapat menggunakan model di route
use App\Models\User;    //Agar dapat menggunakan model di route
use App\Http\Controllers\PostController;     // Agar dapat menggunakan PostController
use App\Http\Controllers\LoginController;   // Agar dapat menggunakan LoginController
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;

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


//Halaman Home
Route::get('/', function () 
{ 
    return view('website.index', [
        'title' => 'home',
        'active' => 'home']);
});

Route::get('/dashboard', function () 
{ 
    return view('website.dashboard', [
            'title' => 'Dashboard',
            'active' => 'Dashboard']);
})->middleware('auth');;

//Halaman blog post
Route::get('/blog', [PostController::class, 'index']);

//Halaman about
Route::get('/about', [PostController::class, 'about'])->middleware('auth'); //Hanya bisa diakses jika user sudah login

//Halaman single Post
Route::get('/blog/{artikel}', [PostController::class, 'post']);

//Halaman seluruh category
Route::get('/categories', [PostController::class, 'category']);

//Halaman Login dan logout
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');   //hanya bisa diakses oleh user yg blm terautentikasi/login
Route::post('/login', [LoginController::class, 'auth']);    //untuk authentication user
Route::post('/logout', [LoginController::class, 'logout']);   

//Halaman Daftar
Route::get('/daftar', [LoginController::class, 'daftar'])->middleware('guest'); //hanya bisa diakses oleh user yg blm terautentikasi/login
Route::post('/daftar', [LoginController::class, 'store']);


Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('isAdmin');


// Kalau ada rute dengan metode requestnya get ke halaman '/'. 
// Kemudian jika ada user yg akses halaman '/' jalankan fungsi yang
// mengembalikan sebuah view yaitu welcome yg berada di folder resources kemudian view.
/*Route::get('/', function () { 
    return view('welcome');
});*/

// Atau kita juga bisa mengembalikan sebuah halaman dengan menulisnya
// secara langsung.
/*Route::get('/', function() {
    return 'Halaman Dashboard';
});*/

//Halaman category sesuai id category
/*Route::get('/categories/{category:slug}', function(Category $category) {
    return view('website.posts', [
        'title' => "$category->name",
        'active' => 'Blog',
        'posts' => $category->posts->load(['Category', 'User'])
    ]);
});*/

//Halaman authors
/*Route::get('/authors/{user}', function(User $user) {
    return view('website.posts', [
        'title' => $user->name,
        'active' => 'Blog',
        'posts' => $user->posts->load(['Category', 'User'])
    ]);
});*/