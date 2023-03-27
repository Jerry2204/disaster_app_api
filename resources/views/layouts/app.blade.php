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
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="{{ asset('login_style/images/favicon.png') }}" type="image/png">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap/css/bootstrap.min.css') }}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/themify-icons/themify-icons.css') }}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/icofont/css/icofont.css') }}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/jquery.mCustomScrollbar.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom.css') }}">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                                    @yield('content')

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('admin/js/script.js') }}"></script>
<script src="{{ asset('admin/js/pcoded.min.js') }}"></script>
<script src="{{ asset('admin/js/demo-12.js') }}"></script>
<script src="{{ asset('admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const listItem = document.querySelectorAll('li');
        const menuLength = menuItem.length;
        let i;
        for(i = 0; i < menuLength; i++){
            if(menuItem[i].href == currentLocation){
                menuItem[i].parentElement.className = "active";
                break;
            }
        }
    </script>
    <script>
        $(".logout").click(function(e) {
            id = e.target.dataset.id

            Swal.fire({
                text: "Are you sure you want to log out from this system?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                }
            })
        })
    </script>
@yield('js')
</body>

</html>
