<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('client.layouts.nav')
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            {{-- <h1 class="text-white">CV Toko Torus Jaya</h1> --}}
                            <!--<p class="text-white">Listen it everywhere. Explore your fav podcasts.</p>
                            <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Start listening</a>-->
                        </div>
                    </div>
                </div>
            </div>
</section>
                <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Content -->
            <div class="container">
            <main>
                {{ $slot }}
            </main>
            </div>
        </div>
        @include('client.footer')
    </body>
</html>
