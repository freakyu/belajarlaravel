

	@include('layouts/main')	<!-- Mengambil navbar dan bootstrap dari folder layouts/main -->

	<div class="container">
		<div class="row">
			@foreach($categories as $category) <!-- mengambil nilai dari postcontoller metod category (php line 75) -->
			<div class="col-md-4 mt-5">
				<div class="card bg-dark text-white">
				  <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="$category->name }}">
				  <div class="card-img-overlay d-flex p-0">
				    <a href="/blog?category={{ $category->slug}}" class = "text-white text-decoration-none"><h5 class="card-title p-2 fs-3" style="background-color: turquoise; text-align: center;" > {{ $category->name }} </h5></a>
				  </div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	
	@include('partials/footer') 	<!-- Mengambil footer dari folder partials/footer -->

	<script type="text/javascript">
   		 alert("Selamat datang di halaman {{ $title }}!");
    </script>
