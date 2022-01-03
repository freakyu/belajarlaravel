<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;   // Supaya controller bisa membaca model posts
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{  
    /*public function dash()
    {
        return view('website.dashboard', [
            'title' => 'Dashboard',
            'active' => 'Dashboard']);
    }*/

    public function index() //Untuk view posts yang mengembalikan judul halaman
    {
        $title = ' ';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category')); //Menampilkan judul halaman sesuai kategori
            $title = $category->name;
        }

        if(request('user')) {
            $user = User::firstWhere('id', request('user'));    //Menampilkan judul halaman sesuai nama penulis/user
            $title = $user->name;
        }


        return view ('website.posts', [
        "title" =>  'Posts ' . $title,
        "active" => 'Blog',
        /*"posts" => $posts->get(),*/
       /* "posts" => Posts::all()  */   //Mengambil sebuah model posts dengan metod all untuk mendapat semua data postingan.
       "posts" => Posts::latest()->Filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString() 
       //Mengambil semua data post dan mengurutkannya dari yang terbaru. kemudian menggunakan filter untuk pencarian dimana berdasarkan kategori, user, maupun judul/tulisan postingan. kemudian semua post-annya menggunakan paginate dimana perhalamannya dibuat untuk 7 postingan dan tidak ada post-an yang sama.

        ]);
    }

    public function post($id)
    {

        return view('website.post1', [      //untuk halaman detail post
            "title" => "Single Post",
            "active" => 'Blog',
            "post" => Posts::find($id)    //Jadi nanti si model postnya ini ngambil judul berdasarkan id
        ]);
    }

    public function about()
    {
         return view('website.about', [
            "title" => " About",
            "active" => 'About',
            "nama1" => "Diah Paramitha",                 // Tinggal panggil nama var di view kontak
            "nama2" => "Dimas Jaya Putra",
            "email2" => "dimasjayaputra01@gmail.com",
            "email" => "diahparamitha01@gmail.com",
            "img" => "mitha1.jpg",
            "vid" => "dimas.jpg"
            ]);
    }

    public function category()
    {
         return view('website.categories', [    //Untuk halaman kategori. diambil semua
        'title' => "Post category",
        'active' => 'Category',
        'categories' =>Category::all()
    ]);
    }

    
}
