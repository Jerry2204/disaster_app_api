@extends('public.layout.app')

@section('title', 'Detail Mitigasi Bencana')

@section('content')
    <div class="container py-5">
        <div class="text-start">
            <p class="fw-bold fs-3">{{ $mitigasiBencana->title }}</p>

            <p class="fs-6">
                {{ \Carbon\Carbon::parse($mitigasiBencana->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
        </div>
        @if ($mitigasiBencana->jenis_konten == 'pdf')
            <div>
                <iframe src="{{ asset('mitigasi/' . $mitigasiBencana->file) }}" width="500" height="500"
                    style="width: 100%;">
                </iframe>
            </div>
        @endif
        @if ($mitigasiBencana->jenis_konten == 'video')
            <div><video controls="" class="w-100">
                    <source src="{{ asset('mitigasi/' . $mitigasiBencana->file) }}" type="video/mp4">Your browser does not
                    support the video tag.
                </video></div>
        @endif
        <p class="fs-6 mt-4">{{ $mitigasiBencana->deskripsi }}</p>
    </div>
@endsection
