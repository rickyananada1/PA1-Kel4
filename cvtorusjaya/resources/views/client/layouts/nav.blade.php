@php
use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link href="{{asset('css/templatemo-pod-talk.css')}}" rel="stylesheet">
	<title>@yield('title')</title>
</head>
<body>
	<main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.html">
                    <img src="" class="logo-image img-fluid" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('client.welcome') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.about')}}">About</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('client.bahanbangunan') }}"><i class="fas fa-tools me-2"></i> Bahan Bangunan</a></li>
							<li><a class="dropdown-item" href="{{ route('client.alatkonstruksi') }}"><i class="fas fa-hammer me-2"></i> Alat-alat Konstruksi</a></li>
							<li><a class="dropdown-item" href="{{ route('client.alatkeamanan') }}"><i class="fas fa-lock me-2"></i> Alat-alat Keamanan</a></li>
							<li><a class="dropdown-item" href="{{ route('client.alatlistrik') }}"><i class="fas fa-bolt me-2"></i> Peralatan Listrik</a></li>
							<li><a class="dropdown-item" href="{{ route('client.alatrt') }}"><i class="fas fa-chair me-2"></i> Peralatan Rumah Tangga</a></li>
							<li><a class="dropdown-item" href="{{ route('client.alattanaman') }}"><i class="fas fa-leaf me-2"></i> Peralatan Tanaman</a>
							</li>
                            </ul>
                        </li>   
                        @guest
                        <ul>                        
                            <a class="nav-link" href="{{route('login')}}">Login</a>                        
                            <a class="nav-link" href="{{ route('register') }}">Registrasi</a>
                        </ul>
                        @else
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
                        @endguest
                </div>
            </div>
        </nav>
    </main>
    
    @yield('content')
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>