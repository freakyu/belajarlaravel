@extends('dashboard/layouts/main')

@section('content')
  <div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
         <h1 class="mb-3">{{ $post->judul }}</h1> <!-- mengambil nilai dari postcontroller php 52 -->

         <a href="/dashboard/posts" class="btn btn-primary text-decoration-none"><span data-feather="arrow-left"></span> Sebelumnya</a>
         <a href="/dashboard/posts/{{ $post->id}}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit"></span> Edit</a>

         <form action="/dashboard/posts/{{ $post->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('yakin hapus data?')"><span data-feather="x-circle"></span> Delete</button>
          </form>
            @if ($post->gambar)
            <div style="max-height: 400px; overflow: hidden;">
              <img src="{{ asset('storage/' . $post->gambar)}}" class="img-fluid mt-3" alt="{{ $post->category->name}}">
            </div>
            @else
              <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="{{ $post->category->name}}">
            @endif
            <article class="my-3">
                <p> {!! $post->tulis !!}</p> <!-- mengambil nilai dari postcontroller php 52 -->
            </article>
      </div>
    </div>
  </div>
    

@endsection