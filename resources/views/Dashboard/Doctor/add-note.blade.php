<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>{{ __('doctor.note.addNote') }}</title>
    <!-- Meta Description Tag -->
    <meta name="Description" content="Klinik is a HTML5 & CSS3 responsive template">
    <!-- Favicon Icon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.png" />
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="/assets/css/fontawsom-all.min.css" />
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="/css/material.min.css" />
    <!-- Material Design Select Field Stylesheet CSS -->
    <link rel="stylesheet" href="/css/mdl-selectfield.min.css">
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
</head>

<body>





    <!-- Start page Title Section -->
    <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>{{ __('doctor.note.addNote') }}</h1>
            </div>
        </div>
    </div>
    <!-- End page Title Section -->

    <!-- Start Login Section -->
    <div id="login-page" class="layer-stretch">
        <div class="layer-wrapper form-container">
            <form action="{{ route('doctor.add-note') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $patientId }}">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-notes-medical"></i>
                    <textarea class="mdl-textfield__input" name="note" id="login-note"></textarea>
                    <label class="mdl-textfield__label" for="login-note">{{ __('doctor.note.note') }}<em> *</em></label>
                    <span class="mdl-textfield__error">{{ __('doctor.note.error') }}</span>
                    @error('note')
                        <p class="color-red fs-sm text-left py-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary fw-bold fs-">
                    {{ __('doctor.note.save') }}
                </button>
            </form>
        </div>
    </div>
    <!-- End Login Section -->

    <!-- **********Included Scripts*********** -->

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
    <script src="/js/jquery.flexslider.min.js"></script>
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
