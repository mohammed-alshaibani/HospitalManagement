<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>{{ __('layout.title') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="/css/pogo-slider.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <!-- <div id="preloader">
  <div class="loader">
   <img src="images/preloader.gif" alt="" />
  </div>
    </div>end loader -->
    <!-- END LOADER -->


    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="images/T1.png" width="65" alt="image"></a>
                <button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse"
                    data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link active" href="#home">{{ __('layout.pages.home') }}</a>
                        </li>
                        {{-- <li><a class="nav-link" href="#logins"> تسجيل الدخول </a></li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#about">{{ __('layout.pages.project') }}</a>
                        </li>
                        {{-- <li><a class="nav-link" href="signup/index.html"> انشاء حساب</a></li> --}}
                        <li class="nav-item ">
                            <a class="nav-link" href="#contact">{{ __('layout.pages.contact') }} </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"href="{{ route('change-lang', app()->getLocale() != 'en' ? 'en' : 'ar') }}">{{ __('layout.pages.lang') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start Banner -->



    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row d-flex items-center justify-center text-secondary text-center">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" data-transition="fade" data-duration="1500"
                        style="background-image:url({{ asset('images/slider-01.jpg') }});">
                        <div class="lbox-caption pogoSlider-slide-element">
                            <div class="lbox-details" style="text-align: center">
                                <h1>{{ __('layout.welcome') }}</h1>
                                <p>{{ __('layout.title') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" data-transition="fade" data-duration="1500"
                        style="background-image:url({{ asset('images/slider-02.jpg') }});">
                        <div class="lbox-caption pogoSlider-slide-element">
                            <div class="lbox-details" style="text-align: center">
                                <h1>{{ __('layout.info') }}</h1>
                                <p>{{ __('layout.infoDesc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" data-transition="fade" data-duration="1500"
                        style="background-image:url({{ asset('images/slider-03.jpg') }});">
                        <div class="lbox-caption pogoSlider-slide-element">
                            <div class="lbox-details" style="text-align: center">
                                <h1>{{ __('layout.easyAccess') }}</h1>
                                <p>{{ __('layout.trusted') }}</p>
                                <a href="#" class="btn"> {{ __('layout.contactUS') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <section id="logins" class="our-blog mt-5 container-fluid">
        <div class="inner-title header text-center mb-2">
            <h2>{{ __('layout.register') }}</h2>
        </div>
        <div class="row">
            <div class="card col-12 col-lg-4 py-2">
                <img src="assets/images/patient.jpg" class=" card-header rounded-lg" alt="">

                <div class="card-body text-center">
                    {{ __('layout.patientLogin') }}
                </div>
                <a href="{{ route('login') }}" target="_blank"
                    class="btn btn-outline-info btn-sm card-footer text-center">
                    {{ __('layout.pressHere') }}
                </a>
            </div>
            <div class="card col-12 col-lg-4 py-2">
                <img src="assets/images/doctor.jpg" class=" card-header rounded-lg" alt="">

                <div class="card-body text-center">
                    {{ __('layout.doctorLogin') }}
                </div>
                <a href="{{ route('login') }}" target="_blank"
                    class="btn btn-outline-info btn-sm card-footer text-center">
                    {{ __('layout.pressHere') }}
                </a>
            </div>
            <div class="card col-12 col-lg-4 py-2">
                <img src="assets/images/admin.jpg" class=" card-header rounded-lg" alt="">

                <div class="card-body text-center">
                    {{ __('layout.adminLogin') }}
                </div>
                <a href="{{ route('login') }}" target="_blank"
                    class="btn btn-outline-info btn-sm card-footer text-center">
                    {{ __('layout.pressHere') }}
                </a>
            </div>
        </div>
    </section>


    <!-- Start About us -->
    <div id="about" class="about-box mt-5 bg-dots-darker">
        <div class="about-a1 card border-0">
            <div class="container card-header text-center fs-md-sm">
                <div class="row">
                    <div class="">
                        <div class="title-box">
                            <h2>{{ __('layout.aboutOurProject') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row container card-body text-justify">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row justify-content-center about-main-info">
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                                <h2> {{ __('layout.about') }}</h2>
                                <p>{{ __('layout.aboutMainDesc') }}</p>
                                <p>{{ __('layout.aboutSubDesc') }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="about-me row drop-shadow">
                                    <img src="images/about-img-01.jpg" class="col-12 col-md-4 my-2" alt="">

                                    <img src="images/about-img-02.jpg" class="col-12 col-md-4 my-2" alt="">

                                    <img src="images/about-img-03.jpg" class="col-12 col-md-4 my-2" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About us -->
    <!-- Start Contact -->
    <div class="px-3 mt-5 row">
        <form class="card border-0 col-12  col-md-6 mt-4">
            <h2 class="w-100 card-header text-center bg-emerald-300">{{ __('layout.contactUS') }}</h2>
            <div class=" card-body m-auto">
                <div class="row w-100">
                    <div class="form-group col-12 col-md-6">
                        <input type="text" class="form-input col-12  border border-secondary rounded p-2  "
                            id="name" name="name" placeholder="{{ __('layout.contact.name') }}" required
                            data-error="{{ __('layout.contact.nameError') }}">
                        <div class="help-block with-errors small text-danger"></div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <input type="email" placeholder="{{ __('layout.contact.email') }}" id="email"
                            class="form-input col-12  border border-secondary rounded p-2 " name="name" required
                            data-error="{{ __('layout.contact.emailError') }}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-12">
                        <input type="tel" placeholder="{{ __('layout.contact.phone') }}" id="phone"
                            class="form-input col-12  border border-secondary rounded p-2 " name="number" required
                            data-error="{{ __('layout.contact.phoneError') }}">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-input col-12  border border-secondary rounded p-2  w-100" id="message"
                        placeholder="ادخل ارسالة" rows="8" data-error="{{ __('layout.contact.messageError') }}" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="submit-button text-center">
                    <button onclick="sendMail()" class="btn btn-primary" id="submit" type="button"
                        type="submit">{{ __('layout.contact.send') }}</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
        <div class=" card col-12 col-md-6 border-0 text-center mt-4">
            <h2 class="card-header">{{ __('layout.address') }}</h2>
            <div class="card-body {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                <div class="media cont-line">
                    <div class="media-left icon-b">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                    </div>
                    <div class="media-body dit-right ">
                        <h4 class="header text-center m-2">{{ __('layout.address') }}</h4>
                        <p class="">{{ __('layout.addressDesc') }}</p>
                    </div>
                </div>
                <div class="media cont-line">
                    <div class="media-right icon-b">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="media-body dit-right row">
                        <h4 class="col-12 text-center">{{ __('layout.email') }}</h4>
                        <a class="col-12 col-md-6 text-secondary "
                            href="mailto:taher.45@gmail.com">taher.45@gmail.com</a><br>
                        <a class="col-12 col-md-6 text-secondary "
                            href="mailto:tawfeeq45@gmail.com">tawfeeq45@gmail.com</a>
                        <a class="col-12 col-md-6 text-secondary "
                            href="mailto:abrahim45@gmail.com">abrahim45@gmail.com</a>
                        <a class="col-12 col-md-6 text-secondary "
                            href="mailto:walad45@gmail.com">walad45@gmail.com</a>
                        <a class="col-12 col-md-6 text-secondary " href="mailto:azoz45@gmail.com">azoz45@gmail.com</a>
                    </div>
                </div>
                <div class="media cont-line">
                    <div class="media-left icon-b">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                    </div>
                    <div class="media-body dit-right row">
                        <h4 class="text-center col-12">{{ __('layout.phone') }}</h4>
                        <a class="col-12 col-md-6  text-secondary" href="tel:776763733">776763733</a><br>
                        <a class="col-12 col-md-6  text-secondary" href="tel:771806850">771806850</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->



    <!-- Start Footer -->
    <footer class="footer-box bg-secondary mt-5 text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="footer-company-name">{{ __('layout.rights', ['year' => '2023']) }} <a
                            class="text-white" href="#">UST.edu</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/jquery.pogo-slider.min.js"></script>
    <script src="/js/slider-index.js"></script>
    <script src="/js/smoothscroll.js"></script>
    <script src="/js/TweenMax.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/form-validator.min.js"></script>
    <script src="/js/contact-form-script.js"></script>
    <script src="/js/isotope.min.js"></script>
    <script src="/js/images-loded.min.js"></script>
    <script src="/js/custom.js"></script>
</body>

</html>
