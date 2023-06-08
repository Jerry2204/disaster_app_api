<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masuk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('image/bpbd.png') }}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
</head>

<body class="fix-menu">
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

    <section class="text-center " style="background-color: #8A9CB7; height: 100vh">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="text-center">
                                <img src="{{ asset('admin/images/logo_bpbd.png') }}" alt="logo.png" style="width: 90px; height: 90px;">
                            </div>
                            <strong class="text-black" style="font-size: 20px">Badan Penanggulangan Bencana Daerah Kabupaten Toba</strong>
                            <h5 style="color:#000000"></h5>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center" style="color: #003D78">Masuk</h3>
                                        <hr style="border: 0.5px solid #000000;">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <input type="text" name="email" class="form-control" placeholder="Username/Email"
                                        style="height: 50px;">
                                    <span class="md-line"></span>
                                </div>

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        style="height: 50px;">
                                    <span class="md-line"></span>
                                </div>


                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Masuk</button>
                                        <p class="mb-0 text-left text-center"><u style="color: blue;">Tidak memiliki akun?</u> <a
                                                href="{{ route('registrasi') }}" style="color: red; text-decoration: underline red;">Daftar</a>
                                        </p>
                                        <br>
                                    </div>
                                    <div class="col-md-12 text-dark">
                                        <a href="{{ url('/') }}" target="_self"
                                            class="btn btn-md btn-block waves-effect text-center m-b-20"
                                            style="background-color: rgb(128, 128, 128); color: #fff;">Kembali Ke Beranda</a>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->

    </section>
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
    <script type="text/javascript" src="{{ asset('admin/js/modernizr/css-scrollbars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/common-pages.js') }}"></script>
</body>

</html>
