<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title','name')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="{{asset ('css/script.js')}}"> </script>

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
		/* Style untuk carousel */
		.carousel-inner img {
    		height: 200px;
    		object-fit: cover;
		}

		
        
        .actu-bloc {
            min-width: 600px;
            width: fit-content;
            padding-bottom: 1%;
            margin-bottom: 50px;
            transition: all 0.2s;
            cursor: pointer;
        }
        
        .img-container {
            position: relative;
            margin-right: 25px;
        }
        
        .cover-img {
            width: 0%;
            position: absolute;
            height: 200px;
            z-index: 1;
            opacity: 0;
            background: rgba(223, 50, 76, 0.6);
            transition: all 0.5s;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        
        .actu-bloc:hover>div div .cover-img {
            width: 100%;
            opacity: 1;
        }
        
        .actu-content {
            display: flex;
            padding: 5% 6%;
            background: #201919;
            height: fit-content;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 0px 0px 60px 0px;
        }
        
        .actu-content h2 {
            font-weight: 700;
            line-height: 24px;
            color: #A82C2C;
        }
        
        .actu-content p {
            font-weight: 400;
            line-height: 26px;
			color: #fff;
        }
        
        .actu-content img {
            border-radius: 10px;
            height: 200px;
            width: 200px;
            object-fit: cover;
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
						<a class="nav-link" href="{{ route('client.dashboard') }}">Dashbord</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
						<ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
							<li><a class="dropdown-item" href="{{ route('client.bahanbangunan') }}"><i class="fas fa-tools me-2"></i> Bahan Bangunan</a></li>
							<li><a class="dropdown-item" href="{{ route('client.peralatankonstruksi') }}"><i class="fas fa-hammer me-2"></i> Alat-alat Konstruksi</a></li>
							<li><a class="dropdown-item" href="{{ route('client.peralatankeamanan') }}"><i class="fas fa-lock me-2"></i> Alat-alat Keamanan</a></li>
							<li><a class="dropdown-item" href="{{ route('client.peralatanlistrik') }}"><i class="fas fa-bolt me-2"></i> Peralatan Listrik</a></li>
							<li><a class="dropdown-item" href="{{ route('client.rumahtangga') }}"><i class="fas fa-chair me-2"></i> Peralatan Rumah Tangga</a></li>
							<li><a class="dropdown-item" href="{{ route('client.peralatantanaman') }}"><i class="fas fa-leaf me-2"></i> Peralatan Tanaman</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">Kontak</a>
						<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
							<li><a class="dropdown-item" href="#"><i class="fas fa-whatsapp me-2"></i> WhatsApp</a></li>
							<li><a class="dropdown-item" href="#"><i class="fas fa-phone me-2"></i> Telepon</a></li>
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
	<div class="container mt-3">
    @yield('content')
	</div>
	@csrf
	@include('client.layouts.footer')
</div>
</body>
</html>