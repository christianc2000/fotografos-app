<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Principal</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand font-weight-bolder mr-3" href="{{route('welcome')}}"><img src="assets/img/logo2.png" width="70"
                height="70" style="border-radius: 20%"></a>
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault"
            aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsDefault">

            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('welcome')}}">Galería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fotografos</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img class="rounded-circle mr-2" src="assets/img/av.png"
                                    width="30"><span class="align-middle"></span>{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <svg style="margin-top:10px;" class="_3DJPT" version="1.1" viewbox="0 0 32 32"
                                    width="21" height="21" aria-hidden="false" data-reactid="71">
                                    <path
                                        d="M7 15.5c0 1.9-1.6 3.5-3.5 3.5s-3.5-1.6-3.5-3.5 1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5zm21.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5zm-12.5 0c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z"
                                        data-reactid="22"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="dropdown02">

                                <span class="dropdown-item">
                                    <a href="{{ route('dashboard') }}" class="btn btn-login d-block">Dashboard</a>
                                </span>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <span class="dropdown-item"><a class="btn btn-secondary d-block" style="color: white"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout</a></span>

                                    {{-- <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link> --}}
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <svg style="margin-top:10px;" class="_3DJPT" version="1.1" viewbox="0 0 32 32"
                                    width="21" height="21" aria-hidden="false" data-reactid="71">
                                    <path
                                        d="M7 15.5c0 1.9-1.6 3.5-3.5 3.5s-3.5-1.6-3.5-3.5 1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5zm21.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5zm-12.5 0c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z"
                                        data-reactid="22"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="dropdown02">
                                <span class="dropdown-item"><a href="{{ route('login') }}" class="btn btn-login d-block">Log
                                        in</a></span>
                                <div class="dropdown-divider">
                                </div>
                                @if (Route::has('register'))
                                    <span class="dropdown-item"><a href="{{ route('register') }}"
                                            class="btn btn-register d-block">Register</a></span>
                                @endif
                            </div>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
    <main role="main">
        <section class="mt-4 mb-5">
            <div class="container mb-4">
                <h1 class="font-weight-bold title">Galería</h1>
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
                        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExplore">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Lifestyle</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Food</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Travel</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                                    <div class="dropdown-menu shadow-lg" aria-labelledby="dropdown01">
                                        <a class="dropdown-item" href="#">Astronomy</a>
                                        <a class="dropdown-item" href="#">Nature</a>
                                        <a class="dropdown-item" href="#">Cooking</a>
                                        <a class="dropdown-item" href="#">Fashion</a>
                                        <a class="dropdown-item" href="#">Wellness</a>
                                        <a class="dropdown-item" href="#">Dieting</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="card-columns">
                        @foreach ($fotografias as $foto)
                            <div class="card card-pin">

                                <img class="card-img" src={{ $foto->url }} alt="Card image">
                                <div class="overlay">
                                    <h2 class="card-title title">Cool Title</h2>
                                    <div class="more">
                                        <a href="post.html">
                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>

    <footer class="footer pt-5 pb-5 text-center">

        <div class="container">

            <div class="socials-media">

                <ul class="list-unstyled">
                    <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                class="fa fa-instagram"></i></a></li>
                    <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                class="fa fa-google-plus"></i></a></li>
                    <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                class="fa fa-behance"></i></a></li>
                    <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                class="fa fa-dribbble"></i></a></li>
                </ul>

            </div>

            <!--
              All the links in the footer should remain intact.
              You may remove the links only if you donate:
              https://www.wowthemes.net/freebies-license/
            -->
            <p>© <span class="credits font-weight-bold">
                    <a target="_blank" class="text-dark"
                        href="https://www.wowthemes.net/pintereso-free-html-bootstrap-template/"><u>Pintereso Bootstrap
                            HTML Template</u> by WowThemes.net.</a>
                </span>
            </p>


        </div>

    </footer>
</body>

</html>
