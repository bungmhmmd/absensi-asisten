<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
	    <title>Absensi Asisten Perpustakaan Gunadarma Kampus H</title>
        <base href="{{ URL::asset('/') }}" target="_top">
        <link rel="stylesheet" href="{{ url('css2/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css2/absensi_asisten.css') }}">
    </head>
    <body>

         <!-- Styles -->
         <style>
            html, body {
                background-color: #EEEEEE;
                color: #5A5A5A;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .kiri{
				text-align:left;
			}
			.kanan{
				text-align:right;
			}

            p.indent{ padding-right: 4em }
            p.indent1{ padding-right: 6.5em }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 50px;
            }
        </style>

        <nav class="navbar  navbar-dark" style="background-color: #4F9EE0">
        <a class="navbar-brand" href="/">Absensi Asisten Perpustakaan Gunadarma Kampus H</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <!-- Authentication Links -->
            @guest
                        @if (Route::has('register'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>                                                            
                            @endif
                        @else
                        <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/daftar-asisten">Daftar Asisten</a>
            </li>            
                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Akun Saya <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Ubah Data</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

        </div>
        </nav>
        <div class="container my-4">
                 
                    @yield('content')
           
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-body text-center">                
                <span>&copy; bungmohammad 2019</span>
            </div>        
        </div>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ url('js2/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ url('js2/popper.min.js') }}" ></script>
        <script src="{{ url('js2/bootstrap.min.js') }}"></script>
    </body>
</html>