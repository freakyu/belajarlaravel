@extends('layouts/main')

@section('content')
	<div class="container my-3">
		<main class="form-registration">
		<h1 class="h3 mb-3 text-center" style="font-style: oblique;">Daftar</h1>
		  <form action="/daftar" method="post">
		  	@csrf <!-- untuk mengenerate token agar user bisa masuk -->
		  	<div class="form-floating">
		      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" required="" value="{{ old('name') }}">
		      <label for="name">Nama lengkap</label>
			      @error('name') <!-- kalau user salah memasukkan data akan muncul pesan eror -->
				      <div class="invalid-feedback">
				      	{{ $message }}
				      </div>
			      @enderror
		    </div>
		  	<div class="form-floating">
		      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required="" value="{{ old('email') }}">
		      <label for="email">Email</label>
		        @error('email')
				      <div class="invalid-feedback">
				      	{{ $message }}
				      </div>
			      @enderror
		    </div>
		    <div class="form-floating">
		      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required="">
		      <label for="password">password</label>
		        @error('password')
				      <div class="invalid-feedback">
				      	{{ $message }}
				      </div>
			      @enderror
		    </div>

		    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
		  </form>
		  <small class=" d-block text-center mt-3">Sudah punya akun? <a href="/login">Login</a></small>
		</main>
	</div>

	@include('partials/footer')
	<script type="text/javascript">
		alert("Selamat datang di halaman {{ $title }} !")
	</script>

@endsection