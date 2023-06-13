@extends('public.layout.app')

@section('title', 'Profil BPBD')

@section('content')
    <div class="container">
        <div class="row">
              <div class="row">
                <div class="col-md-12 my-5">
                    <h3 class="text-center">Visi & Misi BPBD Kabupaten Toba</h3>
                </div>
                @if ($visiMisi)
                <div class="row">
                    <div class="col-md-6">
                        <h4>Visi</h4>
                        <p>Visi Pemerintah Kabupaten Toba untuk periode tahun 2021-2026 adalah:</p>
                        <p>{!! $visiMisi->visi !!}</p>
                    </div>
                    <div class="col-md-6">
                        <h4>Misi</h4>
                        <p>Misi Badan Penanggulangan Bencana Daerah Kabupaten Toba adalah :</p>
                        <p>{!! $visiMisi->misi !!}</p>
                    </div>
                </div>
            @else
                <div class="col-md-12 my-5">
                    <h1 class="mb-5 text-black text-center">VISI & MISI BPBD TOBA BELUM DITAMBAHKAN</h1>
                </div>
            @endif


    <div class="col-md-12 my-5">
        <h3 class="text-center">STRUKTUR ORGANISASI BPBD KABUPATEN TOBA</h3>
    </div>
    <div class="container">
        <div class="row">
            @if (count($petugas) > 0)
                <div class="col-md-4 offset-md-4 mb-4">
                    <div class="card bg-gray text-white"
                        style="border: 2px solid #0255A5; border-bottom-right-radius: 50px; box-sizing: border-box;">
                        <div class="card-body">
                            <div style="display: inline-block; vertical-align: top;">
                                <img src="{{ asset('petugas/' . $petugas[0]->gambar) }}" alt="photo"
                                    style="width: 90px; height: 90px; margin-right: 240px;">
                            </div>
                            <div style="display: inline-block; margin-left: 1px;">
                                <h6 class="card-text" style="color: black; margin-top: 0;">
                                  <br>
                                    <p>{{ $petugas[0]->nama }}</p>
                                    <strong>{{ $petugas[0]->nomor }}</strong>
                                </h6>
                                <div class="trapezoid" style="width: 65%">
                                    <p style="color: black; position: absolute; top: -50px;">
                                        {{ $petugas[0]->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @for ($i = 1; $i < count($petugas); $i++)
                    @if (($i - 1) % 3 == 0)
        </div>
        <div class="row">
            @endif
            <div class="col-md-4 mb-4">
                <div class="card bg-gray text-white position-relative"
                    style="border: 2px solid #0255A5; border-bottom-right-radius: 50px; box-sizing: border-box;">
                    <div class="trapezoid" style="width: 70%">
                        <p style="color: black; position: absolute; top: -50px;">
                            {{ $petugas[$i]->jabatan }}</p>
                    </div>
                    <div class="card-body">
                        <div style="display: inline-block; vertical-align: top;">
                            <img src="{{ asset('petugas/' . $petugas[$i]->gambar) }}" alt="photo"
                                style="width: 90px; height: 90px; margin-right: 240px;">
                        </div>
                        <div style="display: inline-block;" class="position-relative">
                            <h6 class="card-text" style="color: black; margin-top: 0;">
                                <p>{{ $petugas[$i]->nama }}</p>
                                <strong>{{ $petugas[$i]->nomor }}</strong>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        @else
            <div class="col-md-12">
                <h1 class="mb-5 text-Black text-center">STRUKTUR ORGANISASI BELUM DITAMBAHKAN</h1>
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="fixed-bottom d-flex justify-content-end text-center" style="bottom: 50px; right: 20px;">
        <div
            class="button-urgent animasi rounded-circle d-flex justify-content-center align-items-center text-white fs-6">
            <a href="{{ route('report.add') }}" style="text-decoration: none; color: white;">
                <div
                    class="button-urgent animasi rounded-circle d-flex justify-content-center align-items-center text-white fs-6">
                    <i class="fa fa-phone" style="font-size: 30px; color: white;"></i>
                </div>
            </a>
        </div>
    </div>
    <style>
        .trapezoid {
            border-top: 80px solid #D9D9D9;
            border-left: 40px solid transparent;
            width: 250px;
            position: absolute;
            right: -30px;
            top: -10%;
            border-top-color: #D9D9D9;
        }
    </style>
@endsection
