<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a class="mobile-search morphsearch-search" href="#">
                <i class="ti-search"></i>
            </a>
            <a  href="{{ route('public') }}">
                <img class="img-fluid" src="{{ asset('admin/images/logo_bpbd.png') }}" width="45" height="45" alt="Theme-Logo" />
            </a>
            &nbsp;&nbsp;
            <span class="text-white">
               <h5>BPBD TOBA</h5>
            </span>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>

                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!">
                        <i class="ti-bell"></i>
                        @if (auth()->user()->unReadNotifications->count() != 0)
                        <span class="badge bg-c-pink"></span>
                        @endif
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Notifikasi</h6>
                            <label class="label label-danger">Baru</label>
                        </li>
                        @forelse (auth()->user()->unReadNotifications as $item)
                        <a href="{{ route('laporan_bencana.detail', $item->data['laporan_id']) }}" class="mark-as-read" data-id="{{ $item->id }}" data-laporan_id="{{ $item->data['laporan_id'] }}">
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="notification-user">{{ $item->data['nama_bencana'] }}</h5>
                                        <p class="notification-msg">{{ $item->data['keterangan'] }}</p>
                                        @php
                                            $date = new DateTime($item->data['created_at'])
                                        @endphp
                                        <span class="notification-time">{{ $date->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </li>
                        </a>
                        @empty
                        <p class="text-center">Notifikasi Belum Ada</p>
                        @endforelse
                    </ul>
                </li>
                <li class="user-profile header-notification">
                    <a href="#!" class="d-flex align-items-center">
                        <div class="d-flex justify-content-center align-items-center word-image-navbar text-white bg-c-blue mr-3">
                            <b>
                                {{ substr(auth()->user()->name, 0, 1) }}
                                </b>
                        </div>
                        <span>{{ auth()->user()->name }}</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        {{-- <li>
                            <a href="#!">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('users.profile.index') }}">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#">
                                <i class="ti-email"></i> My Messages
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="#">
                                <i class="ti-lock"></i> Lock Screen
                            </a>
                        </li> --}}
                        <li>
                            <a href="#" class="logout">
                                <i class="ti-layout-sidebar-left"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
