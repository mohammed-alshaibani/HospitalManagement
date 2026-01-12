<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>{{ __('forms.confirmAccount') }}</title>
    <!-- Meta Description Tag -->
    <meta name="Description" content="Klinik is a HTML5 & CSS3 responsive template">
    <!-- Favicon Icon -->
    <link rel="icon" type="image/x-icon" href="/images/favicon.png" />
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="/assets/css/fontawsom-all.min.css" />
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="/css/material.min.css" />
    <!-- Material Design Select Field Stylesheet CSS -->
    <link rel="stylesheet" href="css/mdl-selectfield.min.css">
    <!-- Owl Carousel Stylesheet CSS -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css" />
    <!-- Animate Stylesheet CSS -->
    <link rel="stylesheet" href="/css/animate.min.css" />
    <!-- Magnific Popup Stylesheet CSS -->
    <link rel="stylesheet" href="/css/magnific-popup.css" />
    <!-- Flex Slider Stylesheet CSS -->
    <link rel="stylesheet" href="/css/flexslider.css" />
    <!-- Custom Main Stylesheet CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>

<body>
    <!-- Start page Title Section -->
    <div class="page-ttl">

    </div>
    <!-- End page Title Section -->

    <!-- Start Login Section -->
    <div id="register-page" class="layer-stretch">
        <form class="layer-wrapper form-container" action="/doctor-register" method="POST">
            @csrf
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-user"></i>
                <input class="mdl-textfield__input" name="name" type="text" id="register-name">
                <label class="mdl-textfield__label" for="register-name">{{ __('forms.name') }}<em> *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.nameError') }}</span>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-envelope-o"></i>
                <input class="mdl-textfield__input" name="email" type="text"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="register-email">
                <label class="mdl-textfield__label" for="register-email">{{ __('forms.email') }} <em> *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.emailError') }}</span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-phone"></i>
                <input class="mdl-textfield__input" name="phone" type="tel" id="register-phone">
                <label class="mdl-textfield__label" for="register-phone">{{ __('forms.phone') }}<em> *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.phoneError') }}</span>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-map"></i>
                <input class="mdl-textfield__input" name="address" type="text" id="register-address">
                <label class="mdl-textfield__label" for="register-address">{{ __('forms.address') }}<em> *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.addressError') }}</span>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-practic"></i>
                <input class="mdl-textfield__input" name="practice_number" type="text" id="register-practice_number">
                <label class="mdl-textfield__label" for="register-practice_number">{{ __('forms.practiceNumber') }}<em> *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.practiceNumberError') }}</span>
                @error('practice_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-key"></i>
                <input class="mdl-textfield__input" name="password" type="password" id="login-password">
                <label class="mdl-textfield__label" for="login-password">{{ __('forms.password') }} <em> *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.passwordError') }}</span>
                @error('password')
                    <span class="mdl-textfield__error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="forgot.html" class="forgot-pass">{{ __('forms.forgotPassword') }}</a>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                <i class="fa fa-key"></i>
                <input class="mdl-textfield__input" name="password_confirmation" type="password"
                    id="login-password_confirmation">
                <label class="mdl-textfield__label" for="login-password_confirmation">{{ __('forms.confirmPassword') }}<em>
                        *</em></label>
                <span class="mdl-textfield__error">{{ __('forms.confirmPasswordError') }}</span>
                @error('password_confirmation')
                    <span class="mdl-textfield__error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit"
                class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary fw-bold fs-">
                {{ __('confirm') }}
            </button>
        </form>
    </div>
    <!-- End Login Section -->




















    <!-- **********Included Scripts*********** -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Library 2.1 JavaScript-->
    <script src="/js/jquery-2.1.4.min.js"></script>
    <!-- Popper JavaScript-->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Material Design Lite JavaScript-->
    <script src="/js/material.min.js"></script>
    <!-- Material Select Field Script -->
    <script src="/js/mdl-selectfield.min.js"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="js/jquery.flexslider.min.js"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="/js/jquery-scrolltofixed.min.js"></script>
    <!-- Magnific Popup Plugin JavaScript-->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <!-- WayPoint Plugin JavaScript-->
    <script src="/js/jquery.waypoints.min.js"></script>
    <!-- CounterUp Plugin JavaScript-->
    <script src="/js/jquery.counterup.js"></script>
    <!-- SmoothScroll Plugin JavaScript-->
    <script src="/js/smoothscroll.min.js"></script>
    <!--Custom JavaScript for Klinik Template-->
    <script src="/js/custom.js"></script>
</body>

</html>
