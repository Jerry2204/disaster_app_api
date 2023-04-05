@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- card1 start -->
<div class="row">
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Laporan</span>
                <h4>{{ $laporan }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked via microsoft
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
                <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Laporan terkonfirmasi</span>
                <h4>{{ $laporan_terkonfirmasi }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last 24 hours
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                <span class="text-c-blue f-w-600">Laporan diproses</span>
                <h4>{{ $laporan_diproses }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Get more space
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
                <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Laporan selesai</span>
                <h4>{{ $laporan_selesai }}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Just update
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card1 end -->
</div>

@endsection
