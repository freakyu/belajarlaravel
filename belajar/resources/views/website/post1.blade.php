
@extends('layouts/main')

@section('content')


  <!-- Ngambil variabel post dari postcontroller, yangmana postcontroller ngambil dari model posts -->
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col">
            <h1>{{ $post->judul }}</h1> <!-- mengambil nilai dari postcontroller php 52 -->
            <p class="mt-3"> By <a href="/blog?user={{ $post->user->id}}" class="text-decoration-none">{{ $post->user->name }} </a>
            Category <a href="/blog?category={{ $post->category->slug}}" class="text-decoration-none"> {{ $post->category->name }}</a></p>
            <article class="my-3">
                <p> {!! $post->tulis !!} </p> <!-- mengambil nilai dari postcontroller php 52 -->
            </article>
            @if ($post->gambar)
            <div style="max-height: 400px; overflow: hidden;">
              <img src="{{ asset('storage/' . $post->gambar)}}" class="img-fluid" alt="{{ $post->category->name}}">
            </div>
            @else
              <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name}}">
            @endif
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <a href="/blog" class="text-decoration-none"> Kembali ke halaman Blog </a>
  </div>
    

  @include('partials/footer')

  @endsection

  