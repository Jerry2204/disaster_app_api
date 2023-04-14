@extends('public.layout.app')
@section('content')
<div class="hero position-relative d-flex justify-content-center align-items-center"><img
        src="{{ asset('image/banjir.jpg') }}" class="overflow-hidden hero-image" alt="">
    <div class="container position-relative hero-container">
        <div class="row">
            <div class="col-md-6 col-sm-5 text-start d-flex flex-column justify-content-center left-hero">
                <h1 class="text-hero">Anda Dalam Keadaan Darurat?</h1>
                <p class="subtext-hero">Sampaikan Laporan Peristiwa Darurat di Sekitar Anda!</p><a href="{{ route('report.add') }}"
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
                                @if ($item['name'] == 'Berawan')
                                <img src="{{ asset('image/berawan.png') }}" alt="" />
                                @elseif ($item['name'] == 'Hujan Sedang')
                                <img src="{{ asset('image/hujan_sedang.png') }}" alt="" />
                                @elseif ($item['name'] == 'Kabut')
                                <img src="{{ asset('image/kabut.png') }}" alt="" />
                                @elseif ($item['name'] == 'Cerah Berawan')
                                <img src="{{ asset('image/berawan.png') }}" alt="" />
                                @endif
                                <p>{{ \Carbon\Carbon::createFromFormat('YmdHi', $item['datetime'])->format('d M Y, H:i') }}</p>
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
                                        <a href="{{ route('report.detail', $item->id) }}" style="text-decoration: none; color: white;">
                                            Baca Selengkapnya
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
@endsection
