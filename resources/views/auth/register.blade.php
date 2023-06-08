<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
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

    <section class="text-center " style="background-color: #8A9CB7;">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{ route('registrasi') }}" method="POST"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="text-center">
                                <img src="{{ asset('admin/images/logo_bpbd.png') }}" alt="logo.png"
                                    style="width: 90px; height: 90px;">
                            </div>
                            <strong class="text-black" style="font-size: 20px">Badan Penanggulangan Bencana
                                Daerah Kabupaten Toba</strong>
                            <h5 class="text-center" style="color:#000000"></h5>
                            <div class="auth-box" style="width: 400px;">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center" style="color: #003D78">Daftar Akun</h3>
                                        <hr style="border: 0.5px solid #000000;">
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                        style="height: 50px;" value="{{ old('name') }}">
                                </div>
                                <div class="input-group">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan tanggal lahir anda"
                                        style="height: 50px;" value="{{ old('tanggal_lahir') }}">
                                </div>
                                <div class="input-group">
                                    @error('tanggal_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        style="height: 50px;" value="{{ old('username') }}">
                                </div>
                                <div class="input-group">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Alamat Email"
                                        style="height: 50px;" value="{{ old('email') }}">
                                </div>
                                <div class="input-group">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input type="number" name="nomor_telepon" class="form-control"
                                        placeholder="Nomor Telepon" style="height: 50px;"
                                        value="{{ old('nomor_telepon') }}">
                                </div>
                                <div class="input-group">
                                    @error('nomor_telepon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="input-group">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password" style="height: 50px;">
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye toggle-password" id="togglePassword"></i>
                                        </span>
                                    </div> --}}
                                </div>
                                <div class="input-group">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Konfirmasi Password Anda" style="height: 50px;">
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" id="toggleConfirmPassword"></i>
                                        </span>
                                    </div> --}}
                                </div>
                                <div class="input-group">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="input-group">
                                    <span class="md-line"></span>
                                    <div class="input-group-append">
                                        <span class="text-left" id="error-message" style="color: red;"></span>
                                    </div>
                                </div>
                                <span class="text-left" id="error-message" style="color: red;"></span> --}}
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Daftar</button>
                                    </div>
                                </div>
                                <p class="mb-0 text-left text-center"> <a
                                                href="{{'/'}}" style="color: blue; text-decoration: blue red;">Kembali Ke Beranda</a>
                                        </p>
                            </div>
                        </form>

                       <script>
                            //Validasi Password
                            document.getElementById('togglePassword').addEventListener('click', function() {
                                var passwordInput = document.getElementsByName('password')[0];
                                var passwordInputType = passwordInput.getAttribute('type');

                                if (passwordInputType === 'password') {
                                    passwordInput.setAttribute('type', 'text');
                                } else {
                                    passwordInput.setAttribute('type', 'password');
                                }
                            });

                            document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
                                var confirmPasswordInput = document.getElementsByName('password_confirmation')[0];
                                var confirmPasswordInputType = confirmPasswordInput.getAttribute('type');

                                if (confirmPasswordInputType === 'password') {
                                    confirmPasswordInput.setAttribute('type', 'text');
                                } else {
                                    confirmPasswordInput.setAttribute('type', 'password');
                                }
                            });

                            function validateForm() {
                                var password = document.getElementsByName('password')[0].value;
                                var confirmPassword = document.getElementsByName('password_confirmation')[0].value;
                                var errorMessage = document.getElementById('error-message');

                                if (password !== confirmPassword) {
                                    errorMessage.textContent = "Password tidak cocok.";
                                    return false;
                                }

                                errorMessage.textContent = "";
                                return true;
                            }
                        </script>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
