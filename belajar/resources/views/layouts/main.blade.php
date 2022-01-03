<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="{{ asset ('css/style.css') }}">

    <title>Blog Sederhana | {{ $title }}</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

   @include('partials/navbar') <!-- Mengambil navbar dari folder partials/navbar -->

      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner mt-5 ">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1200x450?/NEWS"  alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x450?TRAVEL"   alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x450?ISLAND"   alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x450?PHOTOGRAPH"   alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x450?CITY"   alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
     </div>
   </div>

	 @yield('content') <!-- Isi content nya akan dikirim ke tempat dimana halaman child berada dengan menggunakan section -->
  

 
  </body>
</html>