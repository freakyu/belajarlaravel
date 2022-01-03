@extends('dashboard/layouts/main')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
      </div>

    <div class="col-lg-8">
       <form action="/dashboard/posts" method="post" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus="" required="" value="{{ old('judul') }}">
             @error('judul') <!-- kalau user salah memasukkan data akan muncul pesan eror -->
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" name="category_id" >
              @foreach($categories as $category)
                @if(old('category_id') === $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar post</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('gambar') is-invalid @enderror " type="file" id="gambar" name="gambar" onchange="previewImage()">
             @error('gambar') <!-- kalau user salah memasukkan data akan muncul pesan eror -->
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="tulis" class="form-label">Tulis</label>
            <input id="tulis" type="hidden" name="tulis" value="{{ old('tulis') }}">
            @error('tulis') <!-- kalau user salah memasukkan data akan muncul pesan eror -->
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <trix-editor input="tulis"></trix-editor>
          </div>
          
          <button type="submit" class="btn btn-primary">create post</button>
        </form>
    </div>

    <script>
      document.addEvenListener('trix-file-accept', function(e) {  //untuk menonaktifkan fitur link
        e.preventDefault();
      })


      function previewImage() {
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>

@endsection