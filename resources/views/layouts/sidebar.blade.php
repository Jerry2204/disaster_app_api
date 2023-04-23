<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <div class="d-flex justify-content-center align-items-center word-image text-white bg-c-blue">
                    <b>
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </b>
                </div>
                <div class="user-details">
                    <span style="font-size: 12px">{{ auth()->user()->name }}</span>
                    <span id="more-details">{{ auth()->user()->role  }}<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="#" class="logout"><i class="ti-layout-sidebar-left"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="{{ route('home') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'pra_bencana')
            <li>
                <a href="{{ route('rawan_bencana.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Rawan Bencana</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'tanggap_darurat' || auth()->user()->role == 'pasca_bencana')
            <li>
                <a href="{{ route('laporan_bencana.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Laporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'pra_bencana')
            <li>
                <a href="{{ route('mitigasi_bencana.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Mitigasi Bencana</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('peringatan_dini.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Peringatan Dini</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('artikel.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Artikel</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Petugas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('kontak.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Kontak Darurat</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Profil</div>
            <li>
                <a href="{{ route('profile.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Visi & Misi</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('petugas.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Struktur Organisasi</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
