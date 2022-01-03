	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <div class="container">
			    <a class="navbar-brand" href="/dashboard"><img src="{{asset ('img/logo.png') }}" alt="Logo" width="40" class="img-thumbnail rounded-circle"></a>
				    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="		false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
				    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link {{ ($active === 'Dashboard') ? 'active' : '' }}" href="/dashboard">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link {{ ($active === 'Blog') ? 'active' : '' }}" href="/blog">Blog</a>
			        </li>
			        <li class="nav-item">
			        	<a class="nav-link {{ ($active === 'Category') ? 'active' : ''}}"  href="/categories">Category</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link {{ ($active === 'About') ? 'active' : '' }}" href="/about">About</a>
			        </li>
			      </ul>
			      <ul class="navbar-nav ms-auto">
				      @auth	<!-- hanya ada jika user sudah login dengan akun -->
					      <li class="nav-item">
					      		<!-- Example single danger button -->
							<div class="btn-group">
								<!-- menampilkan nama user yg login dengan auth -->
								  <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								    Selamat datang {{ auth()->user()->name}}
									</button> 
								  	<ul class="dropdown-menu">
									  	<form action="/logout" method="post">
						      			@csrf
									  	<button type="submit" class="btn btn-info dropdown-item">Logout</button>
									  </form>
								  </ul>
							</div>
					      </li>
				      @else <!-- hanya ada jika user belum login/ tidak punya akun -->
				      	<li class="nav-item">
				      		<a class="nav-link {{ ($active === 'Login') ? 'active' : '' }}" href="/login">Login</a>
				      	</li>
				      	<li class="nav-item">
				      		<a class="nav-link {{ ($active === 'Login') ? 'active' : '' }}" href="/daftar">Daftar</a>
				      	</li>
				      @endauth
			      </ul>
			    </div>
		  </div>
	</nav>