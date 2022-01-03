@extends('layouts/main')

@section('content')
	<div class="container my-3">
		@if(session()->has('daftar')) <!-- pesan dari logincontroller php line 37 -->
			<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				{{ session('daftar') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
			</div>
		@endif

		@if(session()->has('login')) <!-- pesan dari logincontroller php line 53 -->
			<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				{{ session('login') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
			</div>
		@endif


		<main class="form-signin">
		<h1 class="h3 mb-3 text-center" style="font-style: oblique;">Login</h1>
		  <form action="/login" method="post">
		  	@csrf <!-- untuk mengenerate token agar user bisa masuk -->
		  	<div class="form-floating">
		      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required="" value="{{ old('email') }}">
		      <label for="email">Email</label>
		      @error('email') <!-- kalau user salah memasukkan data akan muncul pesan eror -->
				      <div class="invalid-feedback">
				      	{{ $message }}
				      </div>
			      @enderror
		    </div>
		    <div class="form-floating">
		      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
		      <label for="password">password</label>
		    </div>

		    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
		  </form>
		  <small class=" d-block text-center mt-3">Belum punya akun? <a href="/daftar">Daftar akun</a></small>
		</main>
	</div>


	@include('partials/footer')
	<script type="text/javascript">
		alert("Selamat datang di halaman {{ $title }} !")
	</script>

@endsection