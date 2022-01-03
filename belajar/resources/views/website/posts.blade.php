
@extends('layouts/main')	<!-- Mengambil navbar dan bootstrap dari folder layouts/main -->

	@section('content')
	

	<!-- Untuk searching -->
	<div class="row justify-content-end mt-3 mb-3">
		<div class="col-md-4">
			<form class="d-flex" action="/blog">
	  	@if(request('category'))
	  	<input type="hidden" name="category" value="{{ request('category') }}">
	  	@endif
	  	@if(request('user'))
	  	<input type="hidden" name="user" value="{{ request('user') }}">
	  	@endif
	    <input class="form-control" type="text" placeholder="Search" name="search" value="{{ request('search') }}">
	    <button class="btn btn-info" type="submit">Search</button>
	  </form>
		</div>
	</div>

	@if ($posts->count())	<!-- Mengambil postingan terakhir atau terbaru -->
	<div class="container mt-4">
		<h1 style="color: salmon; text-align: center;"> {{ $title }} </h1>
		<div class="card mb-3">
		<div class="position-absolute px-2 py-1" style="background-color: lightcoral;"><a href="/categories/{{ $posts[0]->category->slug}}" class = "text-white text-decoration-none">{{ $posts[0]->category->name}}</a></div>
			@if ($posts[0]->gambar)
	            <div style="max-height: 400px; overflow: hidden;">
	              <img src="{{ asset('storage/' . $posts[0]->gambar)}}" class="img-fluid" alt="{{ $posts[0]->category->name}}">
	            </div>
            @else
             <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name}}">
            @endif
		  <div class="card-body text-center">
		    <h5 class="card-title"><a href="/blog/{{ $posts[0]->id }}" class="text-decoration-none text-dark">{{ $posts[0]->judul }}</a></h5>
		    <h6>
		    	<small class="text-muted">
		    		By <a href="/blog?user={{ $posts[0]->user->id}}" class="text-decoration-none">{{ $posts[0]->user->name }} </a>
		    		Category <a href="/blog?category={{ $posts[0]->category->slug}}" class="text-decoration-none">{{ $posts[0]->category->name}} </a> <br/>
		    		at {{ $posts[0]->created_at->diffForHumans() }} 
		    	</small>
		    </h6>
		    <p class="card-text">{{ $posts[0]->excerpt }}</p>
		    <a href="/blog/{{ $posts[0]->id }}" class="btn btn-primary">Read more..</a>
		  </div>
		</div>



	<div class="container">
		<div class="row">
			@foreach($posts->skip(1) as $post)	<!-- menngambil postan setelah postan pertama di skip -->
			<div class="col-md-4 mb-3">
				<div class="card">
					<div class="position-absolute px-2 py-1 " style="background-color: lightcoral;"><a href="/blog?category={{ $post->category->slug}}" 
						class = "text-white text-decoration-none">{{ $post->category->name}}</a></div>

					 @if ($post->gambar)
		              <img src="{{ asset('storage/' . $post->gambar)}}" class="img-fluid" alt="{{ $post->category->name}}">
		             @else
		              <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name}}">
		             @endif
				  <div class="card-body">
				    <h5 class="card-title"><a href="/blog/{{ $post->id }}" class="text-decoration-none text-dark">{{ $post->judul }}</a></h5>
				    <h6>
			    	<small class="text-muted">
			    		By <a href="/blog?user={{ $post->user->id}}" class="text-decoration-none">{{ $post->user->name }} </a><br/>
			    		at {{ $post->created_at->diffForHumans() }} 
			    	</small>
		    		</h6>
				    <p> {{ $post->excerpt}} </p>
				    <a href="/blog/{{ $post->id }}" class="btn btn-primary">Read more..</a>
				  </div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	

	@else
		<p class="text-center fs-4"> No Post Find </p>
	</div>
	@endif


	<div class="d-flex justify-content-end">
		{{ $posts->links() }}	<!-- untuk pagination -->
	</div>

	@include('partials/footer') 	<!-- Mengambil footer dari folder partials/footer -->

	<script type="text/javascript">
		alert("Selamat datang di halaman {{ $title }}!");
	</script>

	@endsection