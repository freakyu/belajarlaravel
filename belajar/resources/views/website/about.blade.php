

@extends('layouts/main') <!-- Mengambil view tempat yield bearada -->

@section('content') <!-- nilainya berasal dari halaman main -->
 <div class="container my-5">
 <div class="row row-cols-1 row-cols-md-3 g-4" style="justify-content: center;">
  <div class="col">
    <div class="card">
      <img src="img/{{ $img }}" width="70" class="card-img-top"  alt="{{ $nama1 }}">
      <div class="card-body">
        <h5 class="card-title">Kontak</h5>
        <h5 class="card-title">{{ $nama1 }}</h5>
        <p class="card-text">Anda dapat menghubungi saya lewat e-mail : {{ $email }}</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img/{{ $vid }}" class="card-img-top"  alt="{{ $nama2 }}">
      <div class="card-body">
        <h5 class="card-title">Kontak</h5>
        <h5 class="card-title">{{ $nama2 }}</h5>
        <p class="card-text">Anda dapat menghubungi saya lewat e-mail : {{ $email2 }}</p>
      </div>
    </div>
  </div>
</div>
</div>

 @include('partials/footer')

 <script type="text/javascript">
    alert("Selamat datang di halaman {{ $title }}!");
  </script>
@endsection <!-- Penutup section -->

