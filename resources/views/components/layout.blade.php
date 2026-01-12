<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->currentLocale()) }}"
    dir="{{ app()->currentLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if ($user->role->value == 'D')
            {{ __('main.doctorTitle') }}{{ $user->name }}
        @elseif ($user->role->value == 'P')
            {{ __('main.patientTitle') }}{{ $user->name }}
        @elseif ($user->role->value == 'A')
            {{ __('main.adminTitle') }}{{ $user->name }}
        @endif
    </title>

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
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/dashboard/style.css">

    <!-- ====== ionicons ======= -->
    <script type="module" src="/assets/js/ionicons.esm.js"></script>
    <script nomodule src="/assets/js/ionicons.js"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="navigation" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
        <ul>
            <li>
                <a href="/dashboard">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="_user" data-name=" user" transform="translate(-108 -188)">
                                <g id="user">
                                    <path id="Vector" d="M0,0H24V24H0Z" transform="translate(108 188)" fill="none"
                                        opacity="0" />
                                    <path id="Vector-2" data-name="Vector" d="M10,5A5,5,0,1,1,5,0,5,5,0,0,1,10,5Z"
                                        transform="translate(115 190)" fill="#fff" opacity="0.4" />
                                    <path id="Vector-3" data-name="Vector"
                                        d="M9.09,0C4.08,0,0,3.36,0,7.5A.5.5,0,0,0,.5,8H17.68a.5.5,0,0,0,.5-.5C18.18,3.36,14.1,0,9.09,0Z"
                                        transform="translate(110.91 202.5)" fill="#fff" />
                                </g>
                            </g>
                        </svg>

                    </span>
                    <span class="title">
                        @if ($user->role->value == 'D')
                            {{ __('main.doctorTitle') }}{{ $user->name }}
                        @elseif ($user->role->value == 'P')
                            {{ __('main.patientTitle') }}{{ $user->name }}
                        @elseif ($user->role->value == 'A')
                            {{ __('main.adminTitle') }}{{ $user->name }}
                        @endif
                    </span>
                </a>
            </li>

            <li class="{{ url()->current() == route('dashboard') ? 'hovered' : '' }}">
                <a href="/dashboard">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="_home-2" data-name=" home-2" transform="translate(-620 -188)">
                                <g id="home-2">
                                    <path id="Vector"
                                        d="M18.05,4.818,12.29.788A4.853,4.853,0,0,0,6.8.918L1.79,4.828A5.153,5.153,0,0,0,0,8.468v6.9A4.631,4.631,0,0,0,4.62,20H15.4a4.622,4.622,0,0,0,4.62-4.62V8.6A5.1,5.1,0,0,0,18.05,4.818Z"
                                        transform="translate(621.99 190.002)" opacity="0.4" />
                                    <path id="Vector-2" data-name="Vector"
                                        d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z"
                                        transform="translate(631.25 202.25)" />
                                    <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z"
                                        transform="translate(620 188)" fill="none" opacity="0" />
                                </g>
                            </g>
                        </svg>
                    </span>
                    <span class="title">{{ __('main.homePage') }}</span>
                </a>
            </li>

            @if ($user->role->value == 'P')
                <li class="{{ url()->current() == route('patient.tests') ? 'hovered' : '' }}">
                    <a href="{{ route('patient.tests', ['page' => 1]) }}">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M7 2v2h1v14a4 4 0 0 0 4 4a4 4 0 0 0 4-4V4h1V2H7m4 14c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1m2-4c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1m1-5h-4V4h4v3Z" />
                            </svg>
                        </span>
                        <span class="title">{{ __('main.scans') }}</span>
                    </a>
                </li>

                <li class="{{ url()->current() == route('patient.rays') ? 'hovered' : '' }}">
                    <a href="{{ route('patient.rays', ['page' => 1]) }}">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19 3H5c-1.11 0-2 .89-2 2v14c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2m-1.9 10H13v1h4s-.06 3-1.5 3c-1.35 0-1-1.53-2.5-2v2c0 .55-.45 1-1 1s-1-.45-1-1v-2c-1.5.47-1.15 2-2.5 2C7.06 17 7 14 7 14h4v-1H6.9c-.05-.31-.06-.65-.1-1H11v-1H6.81c.02-.33.1-.67.19-1h4V9H7.34c.16-.35.31-.69.49-1H11V7c0-.55.45-1 1-1s1 .45 1 1v1h3.17c.18.31.33.65.49 1H13v1h4c.1.33.17.67.19 1H13v1h4.2c-.04.35-.05.69-.1 1Z" />
                            </svg>
                        </span>
                        <span class="title">{{ __('main.rays') }}</span>
                    </a>
                </li>

                <li class="{{ url()->current() == route('patient.inspections') ? 'hovered' : '' }}">
                    <a href="{{ route('patient.inspections', ['page' => 1]) }}">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm5.6-5.225q.2 0 .375-.063t.325-.212l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275t-.7.275L10.6 13.4l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7t.275.7L9.9 15.5q.15.15.325.212t.375.063Z" />
                            </svg>
                        </span>
                        <span class="title">{{ __('main.inspection') }}</span>
                    </a>
                </li>

                <li class="{{ url()->current() == route('patient.medicines') ? 'hovered' : '' }}">
                    <a href="{{ route('patient.medicines', ['page' => 1]) }}">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 3h12v2H6V3m11 3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2m-1 9h-2.5v2.5h-3V15H8v-3h2.5V9.5h3V12H16v3Z" />
                            </svg>
                        </span>
                        <span class="title">{{ __('main.medicine') }}</span>
                    </a>
                </li>
            @elseif ($user->role->value == 'D')
                @if (isset($patientId))
                    <li class="{{ url()->current() == route('patient.tests', ['']) ? 'hovered' : '' }}">
                        <a href="{{ route('patient.tests', ['page' => 1, 'patient_id' => $patientId]) }}">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 2v2h1v14a4 4 0 0 0 4 4a4 4 0 0 0 4-4V4h1V2H7m4 14c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1m2-4c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1m1-5h-4V4h4v3Z" />
                                </svg>
                            </span>
                            <span class="title">{{ __('main.tests') }}</span>
                        </a>
                    </li>

                    <li class="{{ url()->current() == route('patient.rays') ? 'hovered' : '' }}">
                        <a href="{{ route('patient.rays', ['page' => 1, 'patient_id' => $patientId]) }}">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 3H5c-1.11 0-2 .89-2 2v14c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2m-1.9 10H13v1h4s-.06 3-1.5 3c-1.35 0-1-1.53-2.5-2v2c0 .55-.45 1-1 1s-1-.45-1-1v-2c-1.5.47-1.15 2-2.5 2C7.06 17 7 14 7 14h4v-1H6.9c-.05-.31-.06-.65-.1-1H11v-1H6.81c.02-.33.1-.67.19-1h4V9H7.34c.16-.35.31-.69.49-1H11V7c0-.55.45-1 1-1s1 .45 1 1v1h3.17c.18.31.33.65.49 1H13v1h4c.1.33.17.67.19 1H13v1h4.2c-.04.35-.05.69-.1 1Z" />
                                </svg>
                            </span>
                            <span class="title">{{ __('main.rays') }}</span>
                        </a>
                    </li>

                    <li class="{{ url()->current() == route('patient.inspections') ? 'hovered' : '' }}">
                        <a href="{{ route('patient.inspections', ['page' => 1, 'patient_id' => $patientId]) }}">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm5.6-5.225q.2 0 .375-.063t.325-.212l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275t-.7.275L10.6 13.4l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7t.275.7L9.9 15.5q.15.15.325.212t.375.063Z" />
                                </svg>
                            </span>
                            <span class="title">{{ __('main.inspection') }}</span>
                        </a>
                    </li>

                    <li class="{{ url()->current() == route('patient.medicines') ? 'hovered' : '' }}">
                        <a href="{{ route('patient.medicines', ['page' => 1, 'patient_id' => $patientId]) }}">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M6 3h12v2H6V3m11 3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2m-1 9h-2.5v2.5h-3V15H8v-3h2.5V9.5h3V12H16v3Z" />
                                </svg>
                            </span>
                            <span class="title">{{ __('main.medicine') }}</span>
                        </a>
                    </li>
                @else
                    <li class="{{ url()->current() == route('doctor.active-files') ? 'hovered' : '' }}">
                        <a href="{{ route('doctor.active-files') }}">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">{{ __('main.activeFiles') }}</span>
                        </a>
                    </li>
                    <li class="{{ url()->current() == route('doctor.unactive-files') ? 'hovered' : '' }}">
                        <a href="{{ route('doctor.unactive-files') }}">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">{{ __('main.nonActiveFiles') }}</span>
                        </a>
                    </li>
                    <li class="{{ url()->current() == route('doctor.search-for-file') ? 'hovered' : '' }}">
                        <a href="/search-for-file">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">{{ __('main.findFile') }}</span>
                        </a>
                    </li>
                @endif
            @elseif ($user->role->value == 'A')
                <li class="{{ url()->current() == route('patient-manager') ? 'hovered' : '' }}">
                    <a href="/patient-manager">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <g id="_user" data-name=" user" transform="translate(-108 -188)">
                                    <g id="user">
                                        <path id="Vector" d="M0,0H24V24H0Z" transform="translate(108 188)"
                                            fill="none" opacity="0" />
                                        <path id="Vector-2" data-name="Vector"
                                            d="M10,5A5,5,0,1,1,5,0,5,5,0,0,1,10,5Z" transform="translate(115 190)"
                                            fill="#fff" opacity="0.4" />
                                        <path id="Vector-3" data-name="Vector"
                                            d="M9.09,0C4.08,0,0,3.36,0,7.5A.5.5,0,0,0,.5,8H17.68a.5.5,0,0,0,.5-.5C18.18,3.36,14.1,0,9.09,0Z"
                                            transform="translate(110.91 202.5)" fill="#fff" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="title">{{ __('main.patientManage') }}</span>
                    </a>
                </li>
                <li class="{{ url()->current() == route('doctor-manager') ? 'hovered' : '' }}">
                    <a href="/doctor-manager">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <g id="_user" data-name=" user" transform="translate(-108 -188)">
                                    <g id="user">
                                        <path id="Vector" d="M0,0H24V24H0Z" transform="translate(108 188)"
                                            fill="none" opacity="0" />
                                        <path id="Vector-2" data-name="Vector"
                                            d="M10,5A5,5,0,1,1,5,0,5,5,0,0,1,10,5Z" transform="translate(115 190)"
                                            fill="#fff" opacity="0.4" />
                                        <path id="Vector-3" data-name="Vector"
                                            d="M9.09,0C4.08,0,0,3.36,0,7.5A.5.5,0,0,0,.5,8H17.68a.5.5,0,0,0,.5-.5C18.18,3.36,14.1,0,9.09,0Z"
                                            transform="translate(110.91 202.5)" fill="#fff" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="title">{{ __('main.doctorManage') }}</span>
                    </a>
                </li>
            @endif
            {{-- <li>
                <a href="/report">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13 9h5.5L13 3.5V9M6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m9 16v-2H6v2h9m3-4v-2H6v2h12Z" />
                        </svg>
                    </span>
                    <span class="title">{{ __('main.reports') }}</span>
                </a>
            </li> --}}
            <li>
                <a
                    href="{{ route('change-lang', ['lang' => str(app()->getLocale())->upper() == 'EN' ? 'ar' : 'en']) }}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="_translate" data-name=" translate" transform="translate(-748 -316)">
                                <g id="translate">
                                    <path id="Vector" d="M0,0H24V24H0Z" transform="translate(772 340) rotate(180)"
                                        fill="none" opacity="0" />
                                    <path id="Vector-2" data-name="Vector"
                                        d="M6.93,0H3.02C1,0,0,1,0,3.02V6.94C0,9,1,10,3.02,9.95H6.94C9,10,10,9,9.95,6.93V3.02C10,1,9,0,6.93,0Zm.08,7.76a2.952,2.952,0,0,1-1.89-.72,3.7,3.7,0,0,1-2.18.72.75.75,0,0,1,0-1.5A2.32,2.32,0,0,0,5.12,4.6H2.94a.75.75,0,0,1,0-1.5H4.23a.743.743,0,0,1,1.48,0H7A.75.75,0,0,1,7,4.6H6.67a4,4,0,0,1-.53,1.34,1.458,1.458,0,0,0,.87.32.75.75,0,0,1,0,1.5Z"
                                        transform="translate(750 318)" fill="#292d32" />
                                    <path id="Vector-3" data-name="Vector"
                                        d="M7.75,8.5A7.763,7.763,0,0,1,0,.75.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75,6.261,6.261,0,0,0,6.33,6.84l-.27-.45a.751.751,0,0,1,1.29-.77L8.4,7.37a.745.745,0,0,1,.01.75A.781.781,0,0,1,7.75,8.5Z"
                                        transform="translate(749.25 330.25)" fill="#292d32" />
                                    <path id="Vector-4" data-name="Vector"
                                        d="M7.756,8.5a.755.755,0,0,1-.75-.75,6.261,6.261,0,0,0-4.83-6.09l.27.45a.751.751,0,0,1-1.29.77L.106,1.13A.745.745,0,0,1,.1.38.781.781,0,0,1,.756,0a7.763,7.763,0,0,1,7.75,7.75A.755.755,0,0,1,7.756,8.5Z"
                                        transform="translate(762.244 317.25)" fill="#292d32" />
                                    <path id="Vector-5" data-name="Vector"
                                        d="M5.08,0a5.08,5.08,0,1,0,5.08,5.08A5.081,5.081,0,0,0,5.08,0ZM7.56,7.49a.754.754,0,0,1-1.01-.34l-.17-.34H3.79l-.17.34a.753.753,0,0,1-.67.41.756.756,0,0,1-.67-1.09L4.42,2.2a.76.76,0,0,1,.67-.41.751.751,0,0,1,.67.42L7.9,6.48A.763.763,0,0,1,7.56,7.49Z"
                                        transform="translate(759.84 327.85)" fill="#292d32" />
                                    <path id="Vector-6" data-name="Vector" d="M0,1.09H1.09L.54,0Z"
                                        transform="translate(764.38 332.07)" fill="#292d32" />
                                </g>
                            </g>
                        </svg>
                    </span>
                    <span class="title">{{ str(app()->getLocale())->upper() == 'EN' ? 'عربي' : 'English' }}</span>
                </a>
            </li>
            <li>
                <a href="/logout">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M6 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H6zm10.293 5.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L18.586 13H10a1 1 0 1 1 0-2h8.586l-2.293-2.293a1 1 0 0 1 0-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="title">@lang('main.logout')</span>
                </a>
            </li>
            <li>

            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="user d-none">
                @if ($user->role->value == 'D')
                    {{ __('main.doctorTitle') }}{{ $user->name }}
                @elseif ($user->role->value == 'P')
                    {{ __('main.patientTitle') }}{{ $user->name }}
                @elseif ($user->role->value == 'A')
                    {{ __('main.adminTitle') }}{{ $user->name }}
                @endif
            </div>
            {{-- <form action="{{ url()->current() }}" class="search m-2">
            <label>
                <input name="search" type="text" placeholder="ابحث هنا">
            </label>
            <button class="btn bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g id="_search-normal" data-name=" search-normal" transform="translate(-428 -188)">
                        <g id="search-normal">
                            <path id="Vector" d="M19,9.5A9.5,9.5,0,1,1,9.5,0,9.5,9.5,0,0,1,19,9.5Z" transform="translate(430 190)" fill="#292d32" opacity="0.3" />
                            <path id="Vector-2" data-name="Vector" d="M2.552,3.252a.7.7,0,0,1-.49-.2L.2,1.192A.706.706,0,0,1,.2.2a.706.706,0,0,1,.99,0l1.86,1.86a.706.706,0,0,1,0,.99A.738.738,0,0,1,2.552,3.252Z" transform="translate(446.747 206.747)" fill="#292d32" />
                            <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(428 188)" fill="none" opacity="0" />
                        </g>
                    </g>
                </svg>
            </button>
            </form> --}}
            <div></div>
            <div id="toggle" class="toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g id="_menu" data-name=" menu" transform="translate(-684 -380)">
                        <g id="menu">
                            <path id="Vector" d="M0,0H18" transform="translate(687 387)" fill="none"
                                stroke="#292d32" stroke-linecap="round" stroke-width="1.5" />
                            <path id="Vector-2" data-name="Vector" d="M0,0H18" transform="translate(687 392)"
                                fill="none" stroke="#292d32" stroke-linecap="round" stroke-width="1.5"
                                opacity="0.34" />
                            <path id="Vector-3" data-name="Vector" d="M0,0H18" transform="translate(687 397)"
                                fill="none" stroke="#292d32" stroke-linecap="round" stroke-width="1.5" />
                            <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 380)"
                                fill="none" opacity="0" />
                        </g>
                    </g>
                </svg>
            </div>
        </div>

        <!-- ======================= Cards ================== -->

        {{ $slot }}
    </div>

{{--    @if (--}}
{{--        $patientId and--}}
{{--            \App\Models\DoctorPatients::where([--}}
{{--                'doctor_id' => \App\Models\Doctor::whereRelation('user','id',auth()->id())->first()?->id,--}}
{{--                'patient_id' => \App\Models\Patient::where('file_number',$patientId)->first()?->id,--}}
{{--                'code' => 1,--}}
{{--            ])->exists())--}}
{{--        <a href="{{ route('doctor.add-note.index', ['patient_id' => $patientId]) }}"--}}
{{--            class="btn btn-outline-info position-fixed" style="right: 50px;bottom: 40px;">--}}
{{--            {{ __('main.addNote') }}--}}
{{--        </a>--}}
{{--    @endif--}}
    <!-- =========== Scripts =========  -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ionicons.js"></script>
    




</body>

</html>
