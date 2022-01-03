<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.postdb', [
            'title' => 'posts',
            'posts' => Posts::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'new',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate( [
            'judul' => 'required | max:50',
            'category_id' => 'required',
            'gambar' => 'image | file | max:1024',
            'tulis' => 'required'
        ]);

        if($request->file('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('post-images');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 50);


        Posts::create($validated);

        return redirect('/dashboard/posts')->with('success', 'Berhasil menambahkan post!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view('dashboard.post', [
            'post' => $post,    //Harus sesuai dengan route postnya. cara ceknya php artisan route:list
            'title' => auth()->user()->name
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post) //untuk nampilin data yg mau di update
    {
        return view('dashboard.upadate', [
            'title' => 'update',
            'post'=> $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post) //untuk update data yang udah di tampilin
    {
       $updated = $request->validate( [
            'judul' => 'required | max:50',
            'category_id' => 'required',
            'gambar' => 'image | file | max:1024',
            'tulis' => 'required'
        ]);

        if($request->file('gambar')) {
            if($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $updated['gambar'] = $request->file('gambar')->store('post-images');
        }

        $updated['user_id'] = auth()->user()->id;
        $updated['excerpt'] = Str::limit(strip_tags($request->body), 50);


        Posts::where('id', $post->id)
                ->update($updated);

        return redirect('/dashboard/posts')->with('success', 'Postingan sudah di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        if($post->gambar) {
                Storage::delete($post->gambar);
            }

        Posts::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post telah dihapus!');
    }
}
