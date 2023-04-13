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

    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div style="display: flex; align-items: center;">
                    <div class="logo">
                        <img src="{{ asset('image/logo.png') }}" class="logo" alt="" width="30"
                            height="24">
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
                        <a class="nav-link active" aria-current="page" href="{{ route('public') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mitigasi.public') }}">Mitigasi Bencana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Data Bencana
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Bencana Alam</a></li>
                            <li><a class="dropdown-item" href="#">Bencana Non Alam</a></li>
                            <li><a class="dropdown-item" href="#">Bencana Sosial</a></li>

                        </ul>
                    <li class="nav-item">
                        <button class="btn btn-outline-success" type="submit">Masuk</button>
                    </li>
                    </li>
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
                        alt="Logo Tidak ditemukan">
                    <h6>BPBD TOBA</h6>
                </div>
                <div class="col-md-6">
                    <h6>BPBD Kabupaten Toba</h6>
                    <p>JL DI. Panjaitan, Toba Samosir, Balige, Sumatera Utara, Indonesia.</p>
                </div>
                <div class="col-md-2">
                    <h6>Tentang Kami</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Bantuan</a></li>
                        <li><a href="#">Info Layanan</a></li>
                        <li><a href="#">Kegiatan</a></li>
                        <li><a href="#">Pendaftaran</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6>Kontak</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">No Telepon : 0632 21 709</a></li>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Hak Cipta oleh BPBD Kabupaten Toba</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
