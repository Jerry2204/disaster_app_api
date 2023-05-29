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


    <!-- card1 start -->
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
    </div>
    <!-- card1 end -->
</div>

@endsection
