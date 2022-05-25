
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InstaApp - Login</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('assets/css/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(assets/img/bg-gradient.jpg);">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded30 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary">Let's Get Started</h2>
                                <p class="mb-0">Sign in to continue.</p>
                            </div>
                            <div class="p-40">
                                <form action="{{ route('admin.login.store') }}" method="post" id="form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" name="username" class="form-control pl-15 bg-transparent" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" name="password" class="form-control pl-15 bg-transparent" placeholder="Password">
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-6">
                                          <div class="checkbox">
                                            <input type="checkbox" id="basic_checkbox_1" >
                                            <label for="basic_checkbox_1">Remember Me</label>
                                          </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                         <div class="fog-pwd text-right">
                                            <a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                                          </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                          <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                        </div>
                                        <!-- /.col -->
                                      </div>
                                </form>
                                <div class="text-center">
                                    <p class="mt-15 mb-0">Don't have an account? <a href="auth_register.html" class="text-warning ml-5">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#form-data').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    method: 'post',
                }).done(function(e) {
                    // $('body').unblock();
                    var json = JSON.parse(JSON.stringify(e));
                    location.reload();
                    return;
                    // toastr['success'](json.message, '👍 Sukses', {
                    //     closeButton: true,
                    //     tapToDismiss: false
                    // });
                    // setTimeout(function() {
                    //     window.location.href = json.redirect;
                    // }, 2000);
                }).fail(function(e) {
                    // $('body').unblock();
                    var json = JSON.parse(JSON.stringify(e));
                    console.log(json);
                    if (!json.responseJSON.errors.email) {
                        $.each(json.responseJSON.errors.email, function(i, a) {
                            $.toast({
                                heading: 'Terjadi kesalahan!',
                                text: a,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 3500

                            });
                        });
                    } else {
                        $.each(json.responseJSON.errors, function(i, a) {
                            $.toast({
                                heading: 'Terjadi kesalahan!',
                                text: a,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                            });
                        });
                    }
                })
            })
        });
    </script>

</body>
</html>
