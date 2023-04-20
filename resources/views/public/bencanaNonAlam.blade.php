@extends('public.layout.app')

@section('title', 'Bencana Alam')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <h3 class="text-center">Data Bencana Non Alam</h3>
            </div>
            <div class="row">
                @foreach ($bencanaNonAlam as $item)
                <div class="col-md-3 mb-3">
                    <div class="card text-start" style="padding: 0px;">
                        <img src="{{ asset('laporan/' . $item->gambar) }}" alt="1681457803_longsor.jpg"
                            style="border-radius: 5px 5px 0px 0px;">
                        <div class="d-inline ms-3" style="margin-top: -30px;">
                            @if ($item->status_penanggulangan->status == 'menunggu')
                            <p class="badge bg-danger">{{ $item->status_penanggulangan->status }}</p>
                            @elseif ($item->status_penanggulangan->status == 'diterima')
                            <p class="badge bg-info">{{ $item->status_penanggulangan->status }}</p>
                            @elseif ($item->status_penanggulangan->status == 'proses')
                            <p class="badge bg-warning">{{ $item->status_penanggulangan->status }}</p>
                            @elseif ($item->status_penanggulangan->status == 'selesai')
                            <p class="badge bg-success">{{ $item->status_penanggulangan->status }}</p>
                            @endif
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start">
                                {{ $item->nama_bencana }}
                            </h6>
                            <p class="card-subtitle mb-2 text-muted ">
                                {{ \Carbon\Carbon::parse($item->created_at)->locale('id-ID')->format('d F Y') }}
                            </p>
                            <p class="text-secondary fw-light mt-3">
                                {!! Str::words($item->keterangan, 3)  !!}
                            </p>
                            <button class="btn btn-primary mt-5" style="background-color: rgb(2, 85, 165);">
                                <a href="http://127.0.0.1:8000/laporan/4/detail"
                                    style="text-decoration: none; color: white;">
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
@endsection