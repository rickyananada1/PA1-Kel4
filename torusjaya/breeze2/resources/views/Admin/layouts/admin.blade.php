<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CV TORUS JAYA</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="{{ asset('BACKEND/vendor/jquery/jquery.min.js') }}"></script>
	<!-- Core plugin JavaScript-->
	<script src="{{ asset('BACKEND/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('BACKEND/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<!-- Custom scripts for all pages-->
	<script src="{{ asset('BACKEND/js/sb-admin-2.min.js') }}"></script>
	<!-- Page level plugins -->
	<script src="{{ asset('BACKEND/vendor/chart.js/Chart.min.js') }}"></script>
	<!-- Page level custom scripts -->
	<script src="{{ asset('BACKEND/js/demo/chart-area-demo.js') }}"></script>
	<script src="{{ asset('BACKEND/js/demo/chart-pie-demo.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
	
	<style>
		.nav-link:hover {
			color: #ffc107;
		}

		.dropdown-menu {
			background-color: #343a40;
			border: none;
		}

		.dropdown-item {
			color: #fff;
		}

		.dropdown-item:hover {
			background-color: #ffc107;
		}
	</style>
</head>

<body>
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">Toko Bahan Bangunan</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.informasi.informasitoko') }}">Dashbord</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
						<ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
							<li><a class="dropdown-item" href="{{ route('admin.bahanbangunan.bahanbangunan') }}"><i class="fas fa-tools me-2"></i> Bahan Bangunan</a></li>
							<li><a class="dropdown-item" href="{{ route('admin.alatkonstruksi.peralatankonstruksi') }}"><i class="fas fa-hammer me-2"></i> Alat-alat Konstruksi</a></li>
							<li><a class="dropdown-item" href="{{ route('admin.alatkeamanan.peralatankeamanan') }}"><i class="fas fa-lock me-2"></i> Alat-alat Keamanan</a></li>
							<li><a class="dropdown-item" href="{{ route('admin.alatlistrik.peralatanlistrik') }}"><i class="fas fa-bolt me-2"></i> Peralatan Listrik</a></li>
							<li><a class="dropdown-item" href="{{ route('admin.alatrt.rumahtangga') }}"><i class="fas fa-chair me-2"></i> Peralatan Rumah Tangga</a></li>
							<li><a class="dropdown-item" href="{{ route('admin.alattanaman.peralatantanaman') }}"><i class="fas fa-leaf me-2"></i> Peralatan Tanaman</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
						<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
    						<li>
        						<a class="dropdown-item" href="{{ route('profile.edit') }}">
            					<i class="fas fa-cog me-2"></i> {{ __('Profile') }}</a>
    						</li>
    						<li>
        					<form method="POST" action="{{ route('logout') }}">
            					@csrf
								<a class="dropdown-item" href="{{ route('logout') }}"
                					onclick="event.preventDefault(); this.closest('form').submit();">
                				<i class="fas fa-sign-out-alt me-2"></i> {{ __('Log Out') }}</a>
        					</form>
    						</li>		
						</ul>

					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-2">
    @yield('content')
	</div>
	</div>
</body>
@yield('scripts')

</html>