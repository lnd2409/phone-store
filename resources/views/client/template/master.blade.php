<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Cửa hàng điện thoại Dương Bảo</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/client') }}/favicon.png">

    @include('client.template.css')
</head>

<body>

    @include('client.template.header')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @yield('content')
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    @include('client.template.footer')

    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Account Sidebar Navigation -->
    <aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                    <!-- Toggle Button -->
                    <div class="d-flex align-items-center pt-4 px-7">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <i class="ec ec-close-remove"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->

                        <!-- Content -->
                        <div class="js-scrollbar u-sidebar__body">
                            <div class="u-sidebar__content u-header-sidebar__content">
                                {{-- <form class="js-validate" action="{{ route('client.checkauth') }}" method="POST"> --}}
                                    <!-- Login -->
                                    <form class="js-validate" action="{{ route('client.checkauth') }}" method="POST">
                                        @csrf
                                        <div id="login" data-target-group="idForm">
                                            <!-- Title -->
                                            <header class="text-center mb-7">
                                            <h2 class="h4 mb-0">Chào mừng bạn đã trở lại !</h2>
                                            <p>Đăng nhập để quản lí tài khoản</p>
                                            </header>
                                            <!-- End Title -->

                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                    <label class="sr-only" for="signinEmail">Tài khoản</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="signinEmailLabel">
                                                                <span class="fas fa-user"></span>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="lusername" id="signinEmail" placeholder="Tài khoản" aria-label="Email" aria-describedby="signinEmailLabel" required
                                                        data-msg="Please enter a valid email address."
                                                        data-error-class="u-has-error"
                                                        data-success-class="u-has-success">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Form Group -->

                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signinPassword">Mật khẩu</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signinPasswordLabel">
                                                            <span class="fas fa-lock"></span>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="lpassword" id="signinPassword" placeholder="Mật khẩu" aria-label="Password" aria-describedby="signinPasswordLabel" required
                                                    data-msg="Your password is invalid. Please try again."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                                </div>
                                            </div>
                                            <!-- End Form Group -->

                                            <div class="d-flex justify-content-end mb-4">
                                                <a class="js-animation-link small link-muted" href="javascript:;"
                                                data-target="#forgotPassword"
                                                data-link-group="idForm"
                                                data-animation-in="slideInUp">Quên mật khẩu?</a>
                                            </div>

                                            <div class="mb-2">
                                                <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Đăng nhập</button>
                                            </div>

                                            <div class="text-center mb-4">
                                                <span class="small text-muted">Bạn chưa có tài khoản?</span>
                                                <a class="js-animation-link small text-dark" href="javascript:;"
                                                data-target="#signup"
                                                data-link-group="idForm"
                                                data-animation-in="slideInUp">Đăng kí
                                                </a>
                                            </div>

                                            <div class="text-center">
                                                <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                            </div>

                                            <!-- Login Buttons -->
                                            <div class="d-flex">
                                                <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                                <span class="fab fa-facebook-square mr-1"></span>
                                                Facebook
                                                </a>
                                                <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                                <span class="fab fa-google mr-1"></span>
                                                Google
                                                </a>
                                            </div>
                                            <!-- End Login Buttons -->
                                        </div>
                                     </form>


                                    <!-- Signup -->

                                    <form action="{{ route('handleRegister') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
                                            <!-- Title -->
                                            <header class="text-center mb-7">
                                            <h2 class="h4 mb-0">Chào mừng bạn đến với Electro.</h2>
                                            <p>Điền thông tin để bắt đầu!</p>
                                            </header>
                                            <!-- End Title -->

                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                    <label class="sr-only" for="kh_hoten">Họ tên</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="kh_hotenlable">
                                                                <span class="fas fa-user"></span>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="kh_ten" id="kh_hoten" placeholder="Tài khoản" aria-label="Email" aria-describedby="kh_hotenlable" required
                                                        data-msg="Please enter a valid email address."
                                                        data-error-class="u-has-error"
                                                        data-success-class="u-has-success">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                    <label class="sr-only" for="kh_diachi">Địa chỉ</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="kh_diachiLabel">
                                                                <span class="fas fa-user"></span>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="kh_diachi" id="kh_diachi" placeholder="Địa chỉ" aria-label="Email" aria-describedby="kh_diachiLabel" required
                                                        data-msg="Please enter a valid email address."
                                                        data-error-class="u-has-error"
                                                        data-success-class="u-has-success">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Input -->                                   
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                    <label class="sr-only" for="kh_email">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="kh_emailLabel">
                                                                <span class="fas fa-user"></span>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control" name="kh_email" id="kh_email" placeholder="Email" aria-label="kh_email" aria-describedby="kh_emailLabel" required
                                                        data-msg="Please enter a valid email address."
                                                        data-error-class="u-has-error"
                                                        data-success-class="u-has-success">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                    <label class="sr-only" for="signupEmail">Tài khoản</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="signupEmailLabel">
                                                                <span class="fas fa-user"></span>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="username" id="signupEmail" placeholder="Tài khoản" aria-label="Email" aria-describedby="signupEmailLabel" required
                                                        data-msg="Please enter a valid email address."
                                                        data-error-class="u-has-error"
                                                        data-success-class="u-has-success">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                    <label class="sr-only" for="signupPassword">Mật khẩu</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="signupPasswordLabel">
                                                                <span class="fas fa-lock"></span>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control" name="password" id="signupPassword" placeholder="Mật khẩu" aria-label="Password" aria-describedby="signupPasswordLabel" required
                                                        data-msg="Your password is invalid. Please try again."
                                                        data-error-class="u-has-error"
                                                        data-success-class="u-has-success">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Input -->

                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signupConfirmPassword">Nhập lại mật khẩu</label>
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupConfirmPasswordLabel">
                                                            <span class="fas fa-key"></span>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="confirmpassword" id="signupConfirmPassword" placeholder="Nhập lại mật khẩu" aria-label="Confirm Password" aria-describedby="signupConfirmPasswordLabel" required
                                                    data-msg="Password does not match the confirm password."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <!-- End Input -->

                                            <div class="mb-2">
                                                <button type="submit" id="registerKH" class="btn btn-block btn-sm btn-primary transition-3d-hover" disabled >Đăng ký</button>
                                            </div>

                                            <div class="text-center mb-4">
                                                <span class="small text-muted">Bạn đã có tài khoản?</span>
                                                <a class="js-animation-link small text-dark" href="javascript:;"
                                                    data-target="#login"
                                                    data-link-group="idForm"
                                                    data-animation-in="slideInUp">Đăng nhập
                                                </a>
                                            </div>

                                            <div class="text-center">
                                                <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                            </div>

                                            <!-- Login Buttons -->
                                            <div class="d-flex">
                                                <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                                    <span class="fab fa-facebook-square mr-1"></span>
                                                    Facebook
                                                </a>
                                                <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                                    <span class="fab fa-google mr-1"></span>
                                                    Google
                                                </a>
                                            </div>
                                            <!-- End Login Buttons -->
                                        </div>
                                        <!-- End Signup -->

                                     
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </aside>
    <!-- End Account Sidebar Navigation -->
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- Go to Top -->
    <a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
        data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
        <span class="fas fa-arrow-up u-go-to__inner"></span>
    </a>
    <!-- End Go to Top -->
    @include('client.template.js')
    @stack('script')
    @stack('location')
    <script>
      $(document).ready(function () {
          
          $("#signupConfirmPassword").keyup(function (e) { 
            e.preventDefault();
            var pass1 = $("#signupPassword").val();
            var pass2 = $(this).val();
            if(pass1 == pass2)
            {
                $("#registerKH").attr("disabled", false);
            }
            else
            {
                $("#registerKH").attr("disabled", true);
            }

        });
      });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/619cf1356bb0760a4943f759/1fl6gseqf';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
