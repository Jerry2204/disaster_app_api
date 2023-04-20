@extends('public.layout.app')

@section('title', 'Mitigasi Bencana')

@section('content')
    <div class="hero position-relative d-flex justify-content-center align-items-center"><img
            src="{{ asset('image/banjir.jpg') }}" class="overflow-hidden hero-image" alt="">
        <div class="container position-relative hero-container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-start d-flex flex-column justify-content-center left-hero">
                    <h1 class="text-hero text-center">Mitigasi Bencana</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-blue p-5 text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Buku Panduan Mitigasi Bencana</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($mitigasiBencanaPDF as $item)
                <div class="col-md-3 mb-3 text-dark">
                    <div class="card text-start" style="padding: 0px;">
                        <img src="" alt=""
                            style="border-radius: 5px 5px 0px 0px;">
                        <div class="card-body">
                            <h6 class="card-title text-start">
                                {{ $item->title }}
                            </h6>
                            <p class="text-secondary fw-light mt-3">
                                {!! Str::words($item->deskripsi, 3)  !!}
                            </p>
                            <button class="btn btn-primary mt-5"
                                style="background-color: rgb(2, 85, 165);">
                                <a href="{{ route('mitigasi.public.detail', $item->id) }}" class="" style="text-decoration: none; color: white;">
                                    Baca Selengkapnya
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex my-5">
                {!! $mitigasiBencanaPDF->links() !!}
            </div>
        </div>
    </section>
    <section class="bg-oranye p-5 text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Video Panduan Mitigasi Bencana</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($mitigasiBencanaVideo as $item)
                <div class="col-md-3 mb-3 text-dark">
                    <div class="card text-start" style="padding: 0px;">
                        <video>
                            <source
                              src="{{ asset('mitigasi/' . $item->file) }}"
                              type="video/mp4"
                            />
                            Your browser does not support the video tag.
                          </video>
                        <div class="card-body">
                            <h6 class="card-title text-start">
                                {{ $item->title }}
                            </h6>
                            <p class="text-secondary fw-light mt-3">
                                {!! Str::words($item->deskripsi, 3)  !!}
                            </p>
                            <button class="btn btn-primary mt-5"
                                style="background-color: rgb(2, 85, 165);">
                                <a href="{{ route('mitigasi.public.detail', $item->id) }}" class="" style="text-decoration: none; color: white;">
                                    Baca Selengkapnya
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex my-5">
                {!! $mitigasiBencanaPDF->links() !!}
            </div>
        </div>
    </section>
@endsection