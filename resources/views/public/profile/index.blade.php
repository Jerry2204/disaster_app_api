@extends('public.layout.app')

@section('title', 'Profil')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">

                <h3 class="text-center">Visi & Misi BPBD Kabupaten Toba</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Visi</h4>
                    <p>Visi Pemerintah Kabupaten Toba untuk periode tahun 2021-2026 adalah:</p>
                    @foreach ($visiMisi as $item)
                        <p> {!! $item->visi !!}</p>
                </div>
                <div class="col-md-6">
                    <h4>Misi</h4>
                    <p>Misi Badan Penanggulangan Bencana Daerah Kabupaten Toba adalah :</p>
                    <ol>
                        <li> {!! $item->misi !!}</li>

                    </ol>
                    @endforeach
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <h3 class="text-center">STRUKTUR ORGANISASI BPBD KABUPATEN TOBA</h3>
                    <br><br>
                  <div class="container">
  <div class="row">
    @foreach ($petugas as $index => $item)
      @if ($index % 3 == 0)
        </div><div class="row">
      @endif
      <div class="col-md-4 mb-4">
        <div class="card bg-gray text-white"
          style="width: 400px; border: 2px solid #0255A5; border-bottom-right-radius: 50px; box-sizing: border-box;">
          <div class="card-body">
            <div style="display: inline-block; vertical-align: top;">
              <img src="{{ asset('petugas/' . $item->gambar) }}" alt="photo" style="width: 90px; height: 90px; margin-right: 240px;">
            </div>
            <div style="display: inline-block; margin-left: 1px;">
              <h6 class="card-text" style="color: black; margin-top: 0;">
                  <p> {{ $item->nama}}</p>
                  <strong> {{ $item->nomor}}</strong>
              </h6>
              <div class="trapezoid">
                <h5 style="color: black; position: absolute; top: -50px;"> {{ $item->jabatan}}</></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


                </div>
             </div>
        </div>
    </div>
    <style>
        .trapezoid {
            border-top: 80px solid #D9D9D9;
            border-left: 40px solid transparent;
            width: 250px;
            position: absolute;
            left: 41%;
            top: -10%;
            border-top-color: #D9D9D9;
        }
    </style>
@endsection
