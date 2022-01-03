

@extends('layouts/main') <!-- Mengambil view tempat yield bearada -->

@section('content') <!-- nilainya berasal dari halaman main -->
  <div class="container mt-4">
    <figure class="text-center">
      <blockquote class="blockquote">
        <p style="color: navy;">H | O | M | E<br/>
          Disini kamu bisa merasakan sejuknya pemandangan yang diambil 
        dari seluruh negara <br/> dan juga berita-berita dari seluruh dunia.
      Hope you enjoy it!. <br/> Silahkan Login terlebih dahulu </p> 
      </blockquote>
      <figcaption class="blockquote-footer">
        halaman {{ $title }}
      </figcaption>
    </figure>
  </div>

    @include('partials/footer') <!-- Mengambil footer dari folder partials/footer -->

  <script type="text/javascript">
    alert("Selamat datang di halaman {{ $title }}!");
  </script>

@endsection <!-- Penutup section -->

 