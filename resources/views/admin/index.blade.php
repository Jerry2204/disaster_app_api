@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- card1 start -->
<div class="row">
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-warning-alt card1-icon"style="background-color: red" ></i>
                <span class="f-w-600"style="color: red">Laporan</span>
                <h4>{{ $laporan }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        {{-- <i class="text-c-red f-16 icofont icofont-tag m-r-10"></i>
                        Diupdate 2 jam lalu --}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-ui-file bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600"><b>Terkonfirmasi</b></span>
                <h4>{{ $laporan_terkonfirmasi }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        {{-- <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last 24 hours --}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-ui-timer bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Diproses</span>
                <h4>{{ $laporan_diproses }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        {{-- <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Get more space --}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-check-circled  card1-icon"style="background-color:#3AC430;"></i>
                <span class=" f-w-600"style="color:#3AC430;">Selesai</span>
                <h4>{{ $laporan_selesai }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        {{-- <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Just update --}}
                    </span>
                </div>
            </div>
        </div>
    </div>    <!-- card1 end -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-close-circled  card1-icon"style="background-color:red;"></i>
                <span class=" f-w-600"style="color:red;">Ditolak</span>
                <h4>{{ $laporan_ditolak }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">

                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container px-1 px-md-4 py-5 mx-auto">
    @if ($latest->isNotEmpty())
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>
                    <span class="text-dark font-weight-bold"><br>
                        <span class="text-dark" style="margin-left:20pt">{{ $latest->first()->nama_bencana }}</span> | Desa {{ $latest->first()->nama_desa }} | Kecamatan {{ $latest->first()->nama_kecamatan }}
                    </span>
                </h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
               <br>
                <b style="margin-right:20pt">{{ $latest->first()->created_at->format('d F Y') }} <span></span></b>
            </div>

            </div>

        <b class="text-center">Status Penanganan</b>
        <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="{{ $latest->first()->status === 'Menunggu' || $latest->first()->status === 'Diterima' || $latest->first()->status === 'Proses' || $latest->first()->status === 'Selesai' ? 'active' : '' }} {{ $latest->first()->status === 'Diterima' || $latest->first()->status === 'Proses' || $latest->first()->status === 'Selesai' ? 'step1' : '' }}"
                        onclick="showStatusInfo(this)">
                        Menunggu
                        @if ($latest->first()->status === 'Menunggu')
                            <div class="status-info">Laporan telah dikirimkan, mohon tunggu untuk laporan dikonfirmasi.</div>
                        @endif
                    </li>
                    <li class="{{ $latest->first()->status === 'Diterima' || $latest->first()->status === 'Proses' || $latest->first()->status === 'Selesai' ? 'active' : '' }} {{ $latest->first()->status === 'Proses' || $latest->first()->status === 'Selesai' ? 'step1' : '' }}"
                        onclick="showStatusInfo(this)">
                        Diterima
                        @if (in_array($latest->first()->status, ['Diterima', 'Proses', 'Selesai']))
                            <div class="status-info"> Diterima Oleh: <b >{{ $latest->first()->status_penanggulangan->penerima}}</b></div>
                        @endif
                    </li>
                    <li class="{{ $latest->first()->status === 'Proses' || $latest->first()->status === 'Selesai' ? 'active' : '' }} {{ $latest->first()->status === 'Selesai' ? 'step1' : '' }}"
                        onclick="showStatusInfo(this)">
                        Proses
                        @if (in_array($latest->first()->status, ['Proses', 'Selesai']))
                            <div class="status-info"> {{ $latest->first()->status_penanggulangan->tindakan}}</div>
                        @endif
                    </li>
                    <li class="{{ $latest->first()->status === 'Selesai' ? 'active' : '' }}" onclick="showStatusInfo(this)">
                        Selesai
                        @if ($latest->first()->status === 'Selesai')
                            <div class="status-info"> {{ $latest->first()->status_penanggulangan->keterangan}}  </div>
                        @endif
                    </li>
                </ul>
            </div>
            <a href="{{ route('laporan_bencana.detail',  $latest->first()->id) }}" class="btn btn-sm btn-info">Lihat Detail</a>
            @else
        <h3 class="text-center">Tidak ada laporan yang tersedia saat ini.</h3>
    @endif
        </div>


        <style>
            .card {
                z-index: 0;
                padding-bottom: 20px;
                margin-top: 90px;
                margin-bottom: 90px;
                border-radius: 10px;
            }
            .status-info {
        display: none;
        background-color: none;
        padding: 10px;
        border-radius: 5px;
        margin-top: 5px;
    }

            .top {}

            /* Icon progressbar */
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: #02548F;
                padding-left: 0px;
                margin-top: 30px;
            }

            #progressbar li {
                list-style-type: none;
                font-size: 13px;
                width: 25%;
                float: left;
                position: relative;
                font-weight: 400;
            }

            #progressbar .step0:before,
            #progressbar .step1:before {
                font-family: FontAwesome;
                content: "\f10c";
                color: #fff;
            }

            #progressbar li:before {
                width: 40px;
                height: 40px;
                line-height: 45px;
                display: block;
                font-size: 20px;
                background: #C5CAE9;
                border-radius: 50%;
                margin: auto;
                padding: 0px;
                text-align: center;
            }

            /* ProgressBar connectors */
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 12px;
                background: #C5CAE9;
                position: absolute;
                left: 0;
                top: 16px;
                z-index: -1;
            }

            #progressbar li:last-child:after {
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                position: absolute;
                left: -50%;
            }

            #progressbar li:nth-child(2):after,
            #progressbar li:nth-child(3):after {
                left: -50%;
            }

            #progressbar li:first-child:after {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
                position: absolute;
                left: 50%;
            }

            #progressbar li:last-child:after {
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
            }

            #progressbar li:first-child:after {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            /* Color number of the step and the connector before it */
            #progressbar li.active:before,
            #progressbar li.active:after {
                background: #02548F;
            }

            #progressbar li.active:before {
                font-family: FontAwesome;
                content: "\f00c";
                color: #fff;
                line-height: 40px;
            }

            #progressbar li.step1:before {
                font-family: FontAwesome;
                content: "\f00c";
                color: #fff;
                background: #02548F;
                line-height: 40px;
            }

            .icon {
                width: 60px;
                height: 60px;
                margin-right: 15px;
            }

            .icon-content {
                padding-bottom: 20px;
            }

            @media screen and (max-width: 992px) {
                .icon-content {
                    width: 50%;
                }
            }
        </style>

<script>
    function showStatusInfo(element) {
        // Mengambil elemen dengan class 'status-info' di dalam elemen yang diklik
        const statusInfo = element.querySelector('.status-info');

        // Mengubah tampilan (show/hide) keterangan status saat elemen diklik
        if (statusInfo.style.display === "none") {
            statusInfo.style.display = "block";
        } else {
            statusInfo.style.display = "none";
        }
    }
</script>

@endsection
