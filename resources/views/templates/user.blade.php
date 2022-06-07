<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Phone-store</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('famshop/css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- font awesome style -->
    <link href=" {{ asset('famshop/css/font-awesome.min.css') }} " rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href=" {{ asset('famshop/css/style.css') }} " rel="stylesheet" />

    <!-- responsive style -->
    <link href=" {{ asset('famshop/css/responsive.css') }} " rel="stylesheet" />

</head>
<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <h2 class="navbar-brand">
                        Phone-Store
                    </h2>


                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link {{ request()->is('user') ? 'active' : 'collapsed' }}" href="{{ route('user.index') }}">Beranda</a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ request()->is('user') ? 'active' : 'collapsed' }}" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Kategori <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/user/android') }}">Android</a></li>
                                    <li><a href="{{ url('/user/ios') }}">IOS</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('users') ? 'active' : 'collapsed' }}" href="{{ route('akun.index') }}">Akun</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('keranjang.index') }} ">
                                    <i class="fa fa-shopping-cart"></i>
                                    @if($total)
                                    <span class="text-danger" style="font-size: 10px"> {{ $total }} </span>
                                    @endif
                                </a>
                            </li>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>

                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- product section -->
        @yield('content')
        <!-- end product section -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action=" {{ url('user/cari') }} " method="POST">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Temukan produk yang anda inginkan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Cari Produk</label>
                                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Ketik disini">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">cari</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>



        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src=" {{ asset('famshop/js/jquery-3.4.1.min.js') }} "></script>

        <!-- popper js -->
        <script src=" {{ asset('famshop/js/popper.min.js') }} "></script>

        <!-- bootstrap js -->
        <script src=" {{ asset('famshop/js/bootstrap.js') }} "></script>

        <!-- custom js -->
        <script src=" {{ asset('famshop/js/custom.js') }} "></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
