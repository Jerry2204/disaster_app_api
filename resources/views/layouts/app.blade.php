<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('image/bpbd.png') }}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/jquery.mCustomScrollbar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    @yield('css')
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('layouts.navbar')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('layouts.sidebar')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    {{-- @if (Session::has('sukses'))
                                        <script>
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                showConfirmButton: false,
                                                timer: 2000,
                                            })
                                            Toast.fire({
                                                icon: 'success',
                                                title: '{{ session('sukses') }}'
                                            })
                                        </script>
                                    @endif --}}
                                    <script>
                                        @if (!empty(Session::get('sukses')))
                                            var popupId = "{{ uniqid() }}";
                                            if (!sessionStorage.getItem('shown-' + popupId)) {
                                                const Toast = Swal.mixin({
                                                    toast: true,
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                })
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: '{{ session('sukses') }}'
                                                })
                                            }
                                            sessionStorage.setItem('shown-' + popupId, '1');
                                        @endif
                                    </script>
                                    <script>
                                        @if (!empty(Session::get('gagal')))
                                            var popupId = "{{ uniqid() }}";
                                            if (!sessionStorage.getItem('shown-' + popupId)) {
                                                const Toast = Swal.mixin({
                                                    toast: true,
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                })
                                                Toast.fire({
                                                    icon: 'error',
                                                    title: '{{ session('gagal') }}'
                                                })
                                            }
                                            sessionStorage.setItem('shown-' + popupId, '1');
                                        @endif
                                    </script>
                                    @yield('content')

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="fixed-button">
                    <a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank"
                        class="btn btn-md btn-primary">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
                    </a>
                </div> --}}
            </div>
        </div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="admin/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="admin/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="admin/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="admin/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="admin/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
        <!-- Warning Section Ends -->
        <!-- Required Jquery -->
        <script type="text/javascript" src="{{ asset('admin/js/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/js/popper.js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/js/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="{{ asset('admin/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="{{ asset('admin/js/modernizr/modernizr.js') }}"></script>
        <!-- am chart -->
        <script src="{{ asset('admin/pages/widget/amchart/amcharts.min.js') }}"></script>
        <script src="{{ asset('admin/pages/widget/amchart/serial.min.js') }}"></script>
        <!-- Todo js -->
        <script type="text/javascript " src="{{ asset('admin/pages/todo/todo.js') }} "></script>
        <!-- Custom js -->
        <script type="text/javascript" src="{{ asset('admin/pages/dashboard/custom-dashboard.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/js/script.js') }}"></script>
        <script type="text/javascript " src="{{ asset('admin/js/SmoothScroll.js') }}"></script>
        <script src="{{ asset('admin/js/pcoded.min.js') }}"></script>
        <script src="{{ asset('admin/js/demo-12.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>
            var $window = $(window);
            var nav = $('.fixed-button');
            $window.scroll(function() {
                if ($window.scrollTop() >= 200) {
                    nav.addClass('active');
                } else {
                    nav.removeClass('active');
                }
            });
        </script>
        <script>
            $(".logout").click(function(e) {
                id = e.target.dataset.id
                Swal.fire({
                    text: "Apakah Anda yakin ingin keluar dari sistem ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, keluar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                    }
                })
            })
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('.editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('08583ec192b21489bdb9', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('popup-channel');
            channel.bind('report-inserted', function(data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Laporan Baru',
                    text: `Telah terjadi ${data.name.nama_bencana} `,
                    showConfirmButton: true,
                    timer: 10000,
                    confirmButtonText: 'Lihat Laporan',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `{{ env('APP_URL') }}/laporan/bencana/${data.name.id}`;
                    }
                })
            });
        </script>

        <script>
            function sendMarkRequest(id = null) {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                return $.ajax("{{ route('admin.markNotification') }}", {
                    method: 'POST',
                    data: {
                        _token: token,
                        id
                    }
                })
            }

            $(function() {
                $('.mark-as-read').click(function() {
                    let request = sendMarkRequest($(this).data('id'));
                    let laporan_id = $(this).data('laporan_id');

                    request.done(() => {
                        window.location.href = `/laporan/bencana/${laporan_id}`
                    })
                })
            })
        </script>
        @yield('js')
</body>

</html>
