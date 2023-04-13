<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/custom/index.css') }}">
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
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mitigasi Bencana</a>
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
    <div class="hero position-relative d-flex justify-content-center align-items-center"><img
            src="{{ asset('image/banjir.jpg') }}" class="overflow-hidden hero-image" alt="">
        <div class="container position-relative hero-container">
            <div class="row">
                <div class="col-md-6 col-sm-5 text-start d-flex flex-column justify-content-center left-hero">
                    <h1 class="text-hero">Anda Dalam Keadaan Darurat?</h1>
                    <p class="subtext-hero">Sampaikan Laporan Peristiwa Darurat di Sekitar Anda!</p><a href="/darurat"
                        style="text-decoration: none; color: white;"> <button
                            class="btn-custom-danger"><strong>LAPOR!</strong></button></a>
                </div>
                <div class="col-md-6 col-sm-7 right-hero">
                    <div class="box d-flex justify-content-center align-items-center">
                        <div class="peringatan-dini-hero text-center">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="triangle-exclamation"
                                class="svg-inline--fa fa-triangle-exclamation warning-icon" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
                                </path>
                            </svg>
                            <hr class="hr-peringatan">
                            <div class="p-3 fs-6"><b style="font-family: Inter;">Selasa, 11 April 2023 | Laguboti</b>
                                <p class="mt-3" style="font-family: Inter;">Angin kencang diprediksi akan melanda
                                    laguboti, dan diharapkan masyarakat tetap berada di rumah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-blue p-1 text-white">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-7 mb-5">
                    <h5 class="text-start mb-3 fw-bold">
                        PETA DAERAH RAWAN BENCANA
                    </h5>

                </div>
                <div class="col-md-5 md-7">
                    <h5 class="text-start mb-3 fw-bold ">PRAKIRAAN CUACA</h5>
                    <div class="bg-primary w-100 text-white text-start p-3 box-weather shadow ">
                        <h3>Balige</h3>
                        <div class="d-flex overflow-auto shadow">
                            @foreach ($cuaca as $item)
                                <div class="mt-5 ms-3 border px-3 cuaca-box " key={index}>
                                    <img src="" alt="" />
                                    <p>{{ $item['datetime'] }}</p>
                                    <p>{{ $item['name'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-oranye text-black p-1">
        <div class="container">
            <div class="col-md-12 mt-5 mb-5">
                <div class="my-5">
                    <h3 class="mb-5 text-white text-center">Bencana Terkini </h3>
                    <div class="row">
                        @foreach ($newestReport as $item)
                            <div class="col-md-4 mb-3">
                                <div class="card text-start" style="padding: 0px;">
                                    <img src="{{ asset('laporan/' . $item->gambar) }}" alt="{{ $item->gambar }}"
                                        style="border-radius: 5px 5px 0px 0px;">
                                    <div class="card-body">
                                        <h6 class="card-title text-start">
                                            {{ $item->nama_bencana }}
                                        </h6>
                                        <p class="card-subtitle mb-2 text-muted ">
                                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id-ID')->format('d F Y') }}
                                        </p>
                                        <p class="text-secondary fw-light mt-3">
                                            {{ $item->keterangan }}
                                        </p>
                                        <button class="btn btn-primary mt-5"
                                            style="background-color: rgb(2, 85, 165);">
                                            <a href="" style="text-decoration: none; color: white;">
                                                <strong>
                                                    Baca Selengkapnya
                                                </strong>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-blue text-black p-1">
        <div class="container">
            <div class="col-md-12 mt-5 mb-5">
                <div class="my-5">
                    <h3 class="mb-5 text-white text-center">Pengumuman</h3>
                    <div class="row">
                        @foreach ($newestArtikel as $item)
                            <div class="col-md-4 mb-3">
                                <div class="card text-start" style="padding: 0px;">
                                    <img src="{{ asset('artikel/' . $item->gambar) }}" alt="{{ $item->gambar }}"
                                        style="border-radius: 5px 5px 0px 0px;">
                                    <div class="card-body">
                                        <h6 class="card-title text-start">
                                            {{ $item->judul }}
                                        </h6>
                                        <p class="card-subtitle mb-2 text-muted ">
                                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id-ID')->format('d F Y') }}
                                        </p>
                                        <button class="btn btn-primary mt-5"
                                            style="background-color: rgb(2, 85, 165);">
                                            <a href="" style="text-decoration: none; color: white;">
                                                <strong>
                                                    Baca Selengkapnya
                                                </strong>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

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
