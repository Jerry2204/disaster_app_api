
@extends('public.layout.app')

@section('title', 'Laporan Bencana')

@section('content')
<div class="card bg-warning">
    <div class="card-body">
        <strong>Halo Admin Tanggap Darurat,Baru saja ada Laporan Terjadi Bencana dari {{ $authUser['name'] }}</strong>
        <p>Jenis Bencana: {{ $laporanBencana['jenis_bencana'] }}</p>
        <p>Deskripsi: {{ $laporanBencana['keterangan'] }}</p>
        <p>Lokasi: {{ $laporanBencana['lokasi'] }}</p>
    </div>
</div>
@endsection
