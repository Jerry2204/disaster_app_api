<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/custom/index.css') }}">
    <link rel="icon" href="{{ asset('image/bpbd.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_lX5Kf_oGH_rBt6gj-e4zH_-Xb90Qk7M&callback=initMap"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>

<body>
    {{-- <img class="logo" src="{{ asset('image/footer.jpeg') }}" alt="Logo Tidak ditemukan" style="width: 100%;"> --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <div class="container">
            <a class="navbar-brand" href="{{ route('public') }}">
                <div class="d-flex align-items-center">
                    <div class="logo" class="d-sm-none d-md-block">
                        <img src="{{ asset('image/logo.png') }}" style="width: 45px; height: 45px;">
                    </div>

                    <div class="text m ms-3 text-start">
                        <p class="mb-0 brand-bold">Badan Penanggulangan Bencana Daerah</p>
                        <p class="brand-regular mb-0">Kabupaten Toba</p>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('public') }}">Beranda</a>
                    </li>
                    @auth
                    @if (auth()->user()->role == 'user')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('laporanku.public') }}">Laporanku</a>
                        </li>
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bpbd.profil') }}">Profil BPBD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mitigasi.public') }}">Mitigasi Bencana</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Data Bencana
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('bencana.alam') }}">Bencana Alam</a></li>
                            <li><a class="dropdown-item" href="{{ route('bencana.nonalam') }}">Bencana Non Alam</a></li>
                            <li><a class="dropdown-item" href="{{ route('bencana.sosial') }}">Bencana Sosial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item">Keluar <span></span><i class="fa fa-sign-out"
                                                aria-hidden="true"></i></button>

                                    </form>
                                </li>
                                <li>
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'tanggap_darurat' || auth()->user()->role == 'pasca_bencana'|| auth()->user()->role == 'pra_bencana')
                                <li>
                                    <button class="dropdown-item"><a  href="{{ route('home') }}" style="text-decoration: none; color:black;">Admin</a> <span></span></button>
                                   </li>
                                @endif
                                </li>
                            </ul>
                        </li>

                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('login') }}">Masuk</a>
                        </li>
                    @endguest


                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer text-center text-md-start p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-center">
                    <img class="logo" src="{{ asset('image/logo.png') }}"
                        alt="Logo Tidak ditemukan"style="width: 85px; height: 90px;">
                    <h6>BPBD TOBA</h6>

                </div>
                <br>
                <div class="col-md-4">
                    <h6>BPBD Kabupaten Toba</h6>
                    <p>JL . A.B Silalahi Komplek Perkantoran Simanjalo Balige <br>Kec. Balige, Toba, Sumatera Utara, Indonesia</p>
                </div>
                <div class="col-md-2">
                    <h6>Tentang Kami</h6>
                    <ul class="list-unstyled">
                        <li><a href="http://tobatangguh.tobakab.go.id/bpbd/profil">Profil BBPD Toba 2023</a></li>

                    </ul>
                </div>
                <div class="col-md-2">
                    <h6>Kontak</h6>
                    <ul class="list-unstyled">
                        {{-- <li><a href="#">No Telepon : 0632 21 709</a></li> --}}
                        <li><a href="mailto:bpbdtobasa2016@gmail.com">Email: bpbdtobasa2016@gmail.com</a>
                        </li>
                        {{-- <li><a href="#">Hak Cipta oleh BPBD Kabupaten Toba</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-2 text-center">
                        <p>Developed By:</p>
                       <ul class="list-unstyled">
                        <li><a href="https://www.del.ac.id">Institut Teknologi Del </a></li>
                        <li>  <img class="logo" src="{{ asset('image/Logo_ITDEL transparent.png') }}" alt="Logo Tidak ditemukan"
                            style="width: 85px; height: 90px;"></li>

                    </ul>
                </div>
            </div>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{ asset('admin/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        @if (!empty(Session::get('sukses')))
            var popupId = "{{ uniqid() }}";
            if (!sessionStorage.getItem('shown-' + popupId)) {
                const Toast = Swal.mixin({
                    toast: true,
                    showConfirmButton: false,
                    timer: 2000,
                })
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('sukses') }}'
                })
            }
            sessionStorage.setItem('shown-' + popupId, '1');
        @endif
    </script>
    <script>
        @if (!empty(Session::get('gagal')))
            var popupId = "{{ uniqid() }}";
            if (!sessionStorage.getItem('shown-' + popupId)) {
                const Toast = Swal.mixin({
                    toast: true,
                    showConfirmButton: false,
                    timer: 2000,
                })
                Toast.fire({
                    icon: 'error',
                    title: '{{ session('gagal') }}'
                })
            }
            sessionStorage.setItem('shown-' + popupId, '1');
        @endif
    </script>

    <script>
        $(".logout").click(function(e) {
            id = e.target.dataset.id
            Swal.fire({
                text: "Apakah Anda yakin ingin keluar dari sistem ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, keluar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                }
            })
        })
    </script>

    @yield('javascript')
</body>

</html>
