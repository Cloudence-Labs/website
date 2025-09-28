<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Cloudence Nigeria</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <!-- google fonts preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" href="{{ asset('css/vendors.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/icon.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/responsive.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/web-agency.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/custom-mobile-logo.css') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <style>
            /* body {
                font-family: 'Outfit', sans-serif;
            } */

            .outfit-bold {
                font-family: "Outfit", sans-serif;
                font-optical-sizing: auto;
                font-weight: 900;
                font-style: normal;
            }

            .outfit-semi-bold {
                font-family: "Outfit", sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
            }

            .outfit-regular {
                font-family: "Outfit", sans-serif;
                font-optical-sizing: auto;
                font-weight: 300;
                font-style: normal;
            }
        </style>

    </head>
    <body data-mobile-nav-style="classic" class="background-position-center-top" style="background-image: url(images/vertical-line-bg-small-medium-gray.svg)">
        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-light header-transparent bg-transparent disable-fixed">
                <div class="container-fluid">
                    <div class="col-auto col-lg-2 me-lg-0 me-auto">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('images/main/logo.png') }}" data-at2x="{{ asset('images/main/logo.png') }}" alt="" class="default-logo" style="width:150px; height:auto !important">
                            <img src="{{ asset('images/main/logo.png') }}" data-at2x="{{ asset('images/main/logo.png') }}" alt="" class="alt-logo" style="width:150px; height:auto !important">
                            <img src="{{ asset('images/main/logo.png') }}" data-at2x="{{ asset('images/main/logo.png') }}" alt="" class="mobile-logo" style="width:150px; height:auto !important">
                        </a>
                    </div>
                    <div class="col-auto col-lg-8 menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="#" class="nav-link outfit-regular">Home</a></li>
                                <li class="nav-item dropdown dropdown-with-icon">
                                    <a href="#" class="nav-link outfit-regular">Company</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">About </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Our Mission & Vision</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-with-icon">
                                    <a href="#" class="nav-link outfit-regular">Our Services</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Enterprise Software Development </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Web Development</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Mobile Development</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">CCTV Installation</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Network Implematation</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">IT Consulting</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Installation & Supplies</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link outfit-regular">Products</a></li>
                                <li class="nav-item dropdown dropdown-with-icon">
                                    <a href="#" class="nav-link outfit-regular">Industries</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Government & Public Sector</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Education</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Healthcare</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Hospitality</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-with-icon">
                                    <a href="#" class="nav-link outfit-regular">Media</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">News</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="submenu-icon-content">
                                                    <span class="outfit-regular">Blog</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 text-end">
                        <div class="header-icon">
                            <div class="header-button">
                                <a href="#" class="btn btn-rounded btn-dark-gray btn-medium btn-switch-text btn-box-shadow text-transform-none">
                                    <span>
                                        <span class="btn-double-text" data-text="Contact Us">Contact Us</span>
                                        <span><i class="fa-solid fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation -->
        </header>
        <!-- end header -->
        <!-- start banner -->
        <section class="p-0 border-radius-6px full-screen md-h-600px sm-h-450px ipad-top-space-margin position-relative overflow-hidden">
            <div id="particles-style-01" class="position-absolute h-100 top-0 left-0 w-100" data-particle="true" data-particle-options='{"particles":{"number":{"value":10,"density":{"enable":true,"value_area":800}},"color":{"value":["#000000", "#f7c568"]},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":4,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}'></div>
            <div class="looping-wrapper md-h-100"></div>
            <div class="text-base-color absolute-middle-center banner-title fw-600 d-none d-md-inline-block outfit-bold" data-anime='{ "el": "lines", "translateX": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>Cloudence</div>
            <div class="container h-100 position-relative">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-12 text-center">
                        <div class="fs-120 lh-110 sm-fs-100 text-dark-gray fw-600 ls-minus-4px outfit-bold" data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 500, "staggervalue": 300, "easing": "easeOutQuad" }'>Empowering growth through smart technology</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <!-- start section -->
        <section class="p-0">
            <div class="container">
                <div class="row justify-content-center align-items-center flex-column flex-sm-row" data-anime='{ "el": "childs", "translateX": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col-auto icon-with-text-style-08 md-mb-10px text-center text-md-start">
                        <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                            <div class="feature-box-icon me-5px">
                                <i class="bi bi-patch-check-fill fs-15 text-dark-gray"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-14 fw-600 text-dark-gray text-uppercase outfit-regular">Innovation</span>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <div class="col-auto md-mb-15px d-none d-md-flex">
                        <span class="progress-step-separator bg-dark-gray w-100px lg-w-70px separator-line-1px d-block mx-auto"></span>
                    </div>
                    <!-- start features box item -->
                    <div class="col-auto icon-with-text-style-08 md-mb-10px text-center text-md-start">
                        <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                            <div class="feature-box-icon me-5px">
                                <i class="bi-award-fill fs-15 text-dark-gray"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-14 fw-600 text-dark-gray text-uppercase outfit-regular">Reliability</span>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <div class="col-auto md-mb-15px d-none d-md-flex">
                        <span class="progress-step-separator bg-dark-gray w-100px lg-w-70px separator-line-1px d-block mx-auto"></span>
                    </div>
                    <!-- start features box item -->
                    <div class="col-auto icon-with-text-style-08 text-center text-md-start">
                        <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                            <div class="feature-box-icon me-5px">
                                <i class="bi-hand-thumbs-up-fill fs-15 text-dark-gray"></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-14 fw-600 text-dark-gray text-uppercase outfit-regular">Transformation</span>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="position-relative overflow-hidden section-dark">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-6">
                        <div class="outside-box-left-20 md-outside-box-left-0" data-bottom-top="transform:scale(1.1, 1.1)" data-top-bottom="transform:scale(1, 1)">
                            <img src="{{ asset('images/main/partner.jpg') }}" alt=""/>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 z-index-9 md-mt-35px" data-anime='{ "el": "childs", "translateX": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="text-dark-gray fw-600 mb-40px md-mb-25px outside-box-left-15 md-outside-box-left-0 ls-minus-3px word-break-normal text-shadow-double-large outfit-bold" style="color:orange">We are your digital partner to business growth.</h1>
                        <p class="lh-34 w-95 mb-30px lg-w-100 outfit-regular">At Cloudence, we specialize in delivering innovative and reliable ICT solutions that empower businesses and government institutions to scale with confidence. From infrastructure development to enterprise software, we work closely with our clients to understand their unique needs and provide tailored technology that drives efficiency, productivity, and sustainable growth. With a focus on trust, excellence, and innovation, Cloudence is more than a service provider — we’re your strategic partner in digital transformation.</p>

                        <div class="outside-box-right-30 position-absolute right-0px bottom-minus-50px xl-outside-box-right-25 md-outside-box-right-0 d-none d-md-inline-block">
                            <div class="fs-300 xl-fs-250 lg-fs-200 text-base-color fw-600 ls-minus-20px word-break-normal" data-bottom-top="transform:scale(1, 1) translate3d(0px, 0px, 0px);" data-top-bottom="transform:scale(1, 1) translate3d(-100px, 0px, 0px);">about</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="p-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 m-0 justify-content-center" data-anime='{ "el": "childs", "translateY": [40, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start process step item -->
                    <div class="col process-step-style-10 ps-5 pe-5 pt-3 pb-3 sm-mb-20px position-relative hover-box">
                        <div class="process-step-icon-box position-absolute top-minus-15px left-25px md-left-0px">
                            <div class="number d-inline-block fs-90 fw-700 text-outline text-outline-color-extra-medium-gray outfit-regular">01</div>
                        </div>
                        <span class="fs-19 fw-600 text-dark-gray mb-5px d-block position-relative outfit-semi-bold">Consultation & Planning</span>
                        <div class="position-relative pb-60px last-paragraph-no-margin">
                            <p class="lh-30 w-90 sm-w-100 outfit-regular">At Cloudence, we begin by understanding your goals and requirements. This helps us craft a clear, strategic plan that aligns technology with your business needs.</p>
                            <a href="#" class="hover-content d-flex justify-content-center align-items-center icon-box w-45px h-45px rounded-circle bg-base-color border-2"><i class="feather icon-feather-arrow-right text-dark-gray icon-small"></i></a>
                        </div>
                    </div>
                    <!-- end process step item -->
                    <!-- start process step item -->
                    <div class="col process-step-style-10 ps-5 pe-5 pt-3 pb-3 sm-mb-20px position-relative mt-40px md-mt-0 hover-box">
                        <div class="process-step-icon-box position-absolute top-minus-15px left-25px md-left-0px">
                            <div class="number d-inline-block fs-90 fw-700 text-outline text-outline-color-extra-medium-gray outfit-semi-bold">02</div>
                        </div>
                        <span class="fs-19 fw-600 text-dark-gray mb-5px d-block position-relative outfit-bold">Development & Testing</span>
                        <div class="position-relative pb-60px last-paragraph-no-margin">
                            <p class="lh-30 w-90 sm-w-100 outfit-regular">We assess your needs, define clear goals, and create a strategic roadmap to guide the development process from day one.</p>
                            <a href="#" class="hover-content d-flex justify-content-center align-items-center icon-box w-45px h-45px rounded-circle bg-base-color border-2"><i class="feather icon-feather-arrow-right text-dark-gray icon-small"></i></a>
                        </div>
                    </div>
                    <!-- end process step item -->
                    <!-- start process step item -->
                    <div class="col process-step-style-10 ps-5 pe-5 pt-3 pb-3 sm-mb-20px position-relative hover-box">
                        <div class="process-step-icon-box position-absolute top-minus-15px left-25px md-left-0px">
                            <div class="number d-inline-block fs-90 fw-700 text-outline text-outline-color-extra-medium-gray outfit-semi-bold">03</div>
                        </div>
                        <span class="fs-19 fw-600 text-dark-gray mb-5px d-block position-relative outfit-bold">Launch & Support</span>
                        <div class="position-relative pb-60px last-paragraph-no-margin">
                            <p class="lh-30 w-90 sm-w-100 outfit-regular">We ensure a smooth product launch and continue to provide ongoing support, updates, and maintenance to keep your solution running at its best.</p>
                            <a href="#" class="hover-content d-flex justify-content-center align-items-center icon-box w-45px h-45px rounded-circle bg-base-color border-2"><i class="feather icon-feather-arrow-right text-dark-gray icon-small"></i></a>
                        </div>
                    </div>
                    <!-- end process step item -->
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="position-relative">
            <div class="container">
                <div class="row align-items-center mb-4" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-xl-5 lg-mb-30px text-center text-xl-start">
                        <div class="outside-box-left-25 md-outside-box-left-50">
                            <div class="fs-350 xl-fs-300 lg-fs-250 text-base-color fw-600 ls-minus-20px position-relative d-inline-block word-break-normal" data-bottom-top="transform:scale(1, 1) translate3d(0px, 0px, 0px);" data-top-bottom="transform:scale(1, 1) translate3d(-100px, 0px, 0px);">projects
                                <div class="position-absolute right-minus-100px top-minus-120px z-index-9 md-w-200px d-none d-md-block" data-anime='{ "translateY": [0, 0], "scale": [0.7, 1], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 tab-style-04 text-center text-xl-end">
                        <!-- filter navigation -->
                        <ul class="portfolio-filter nav nav-tabs justify-content-center justify-content-xl-end border-0 fw-500">
                            <li class="nav active outfit-semi-bold"><a data-filter="*" href="#">All</a></li>
                            <li class="nav outfit-semi-bold"><a data-filter=".education" href="#">Education</a></li>
                            <li class="nav outfit-semi-bold"><a data-filter=".fintech" href="#">Fintech/Banking</a></li>
                            <li class="nav outfit-semi-bold"><a data-filter=".digital" href="#">Digital Payments</a></li>
                            <li class="nav outfit-semi-bold"><a data-filter=".others" href="#">Others</a></li>
                        </ul>
                        <!-- end filter navigation -->
                    </div>
                </div>
                <div class="row" data-anime='{  "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-12 filter-content p-md-0">
                        <ul class="portfolio-modern portfolio-wrapper grid-loading grid grid-3col xxl-grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            <!-- start portfolio item -->
                            <li class="grid-item education transition-inner-all">
                                <a href="https://uee-akamkpa.edu.ng" target="_blank">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image border-radius-4px">
                                            <img src="{{ asset('images/main/clients/uee.png') }}" alt="" style="border: 1px solid #ccc; border-radius:4px" />
                                        </div>
                                        <div class="portfolio-hover box-shadow-extra-large">
                                            <div class="bg-white d-flex align-items-center align-self-end text-start border-radius-4px ps-30px pe-30px pt-20px pb-20px lg-p-20px w-100">
                                                <div class="me-auto">
                                                    <div class="fs-12 fw-500 text-medium-gray text-uppercase lh-24 outfit-regular">Education</div>
                                                    <div class="fw-700 text-dark-gray text-uppercase lh-initial outfit-semi-bold">University of Education & Entreprenueship, Akamkpa</div>
                                                </div>
                                                <div class="ms-auto"><i class="feather icon-feather-plus icon-extra-medium text-dark-gray lh-36"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fintech transition-inner-all">
                                <a href="https://topratepay.com" target="_blank">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image border-radius-6px">
                                            <img src="{{ asset('images/main/clients/topratepay.png') }}" alt="" style="border: 1px solid #eee; border-radius:4px" />
                                        </div>
                                        <div class="portfolio-hover box-shadow-extra-large">
                                            <div class="bg-white d-flex align-items-center align-self-end text-start border-radius-4px ps-30px pe-30px pt-20px pb-20px lg-p-20px w-100">
                                                <div class="me-auto">
                                                    <div class="fs-12 fw-500 text-medium-gray text-uppercase lh-24 outfit-regular">Fintech</div>
                                                    <div class="fw-700 text-dark-gray text-uppercase lh-initial outfit-semi-bold">Toprate Pay</div>
                                                </div>
                                                <div class="ms-auto"><i class="feather icon-feather-plus icon-extra-medium text-dark-gray lh-36"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item digital transition-inner-all">
                                <a href="https://billerhub.ng" target="_blank">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image border-radius-6px">
                                            <img src="{{ asset('images/main/clients/billerhub.png') }}" alt="" style="border: 1px solid #eee; border-radius:4px" />
                                        </div>
                                        <div class="portfolio-hover box-shadow-extra-large">
                                            <div class="bg-white d-flex align-items-center align-self-end text-start border-radius-4px ps-30px pe-30px pt-20px pb-20px lg-p-20px w-100">
                                                <div class="me-auto">
                                                    <div class="fs-12 fw-500 text-medium-gray text-uppercase lh-24 outfit-regular"> Digital Payments</div>
                                                    <div class="fw-700 text-dark-gray text-uppercase lh-initial outfit-semi-bold">Billerhub</div>
                                                </div>
                                                <div class="ms-auto"><i class="feather icon-feather-plus icon-extra-medium text-dark-gray lh-36"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fintech digital transition-inner-all">
                                <a href="https://topratemfbank.com.ng" target="_blank">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image border-radius-6px">
                                            <img src="{{ asset('images/main/clients/toprate-bank.png') }}" alt="" style="border: 1px solid #eee; border-radius:4px"  />
                                        </div>
                                        <div class="portfolio-hover box-shadow-extra-large">
                                            <div class="bg-white d-flex align-items-center align-self-end text-start border-radius-4px ps-30px pe-30px pt-20px pb-20px lg-p-20px w-100">
                                                <div class="me-auto">
                                                    <div class="fs-12 fw-500 text-medium-gray text-uppercase lh-24 outfit-regular">Banking</div>
                                                    <div class="fw-700 text-dark-gray text-uppercase lh-initial outfit-semi-bold">Toprate Microfinance Bank</div>
                                                </div>
                                                <div class="ms-auto"><i class="feather icon-feather-plus icon-extra-medium text-dark-gray lh-36"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item selected digital transition-inner-all">
                                <a href="https://rechargefusion.com" target="_blank">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image border-radius-6px">
                                            <img src="{{ asset('images/main/clients/rechargefusion.png') }}" alt="" style="border: 1px solid #eee; border-radius:4px"/>
                                        </div>
                                        <div class="portfolio-hover box-shadow-extra-large">
                                            <div class="bg-white d-flex align-items-center align-self-end text-start border-radius-4px ps-30px pe-30px pt-20px pb-20px lg-p-20px w-100">
                                                <div class="me-auto">
                                                    <div class="fs-12 fw-500 text-medium-gray text-uppercase lh-24 outfit-regular">Digital Payments</div>
                                                    <div class="fw-700 text-dark-gray text-uppercase lh-initial outfit-semi-bold">Recharge Fusion</div>
                                                </div>
                                                <div class="ms-auto"><i class="feather icon-feather-plus icon-extra-medium text-dark-gray lh-36"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item others web transition-inner-all">
                                <a href="https://e-hs.com.ng" target="_blank">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image border-radius-6px">
                                            <img src="{{ asset('images/main/clients/ehs.png') }}" alt="" style="border: 1px solid #eee; border-radius:4px"/>
                                        </div>
                                        <div class="portfolio-hover box-shadow-extra-large">
                                            <div class="bg-white d-flex align-items-center align-self-end text-start border-radius-4px ps-30px pe-30px pt-20px pb-20px lg-p-20px w-100">
                                                <div class="me-auto">
                                                    <div class="fs-12 fw-500 text-medium-gray text-uppercase lh-24 outfit-regular">Logistics & Transport</div>
                                                    <div class="fw-700 text-dark-gray text-uppercase lh-initial outfit-semi-bold">Emmanuel Haulage Services</div>
                                                </div>
                                                <div class="ms-auto"><i class="feather icon-feather-plus icon-extra-medium text-dark-gray lh-36"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end portfolio item -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        {{-- <section>
            <div class="container">
                <div class="row" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-lg-5 text-center text-lg-start">
                        <h2 class="text-dark-gray fw-600 mb-25px w-90 md-w-100 ls-minus-3px">Clients</h2>
                        <div class="bg-dark-gray border-radius-100px fs-12 text-white ps-25px pe-25px d-inline-block text-uppercase fw-500 mb-10 ls-05px md-mb-30px">Direct from the heart</div>
                        <div class="outside-box-left-35 md-outside-box-left-0 d-none d-md-block md-mb-6">
                            <div class="fs-350 xl-fs-300 lg-fs-250 text-base-color fw-600 ls-minus-20px word-break-normal" data-bottom-top="transform:scale(1, 1) translate3d(0px, 0px, 0px);" data-top-bottom="transform:scale(1, 1) translate3d(-100px, 0px, 0px);">awards</div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 text-center text-lg-start">
                        <p class="w-85 lg-w-100 mb-40px mt-10 md-mt-0 md-mb-25px">We are excited for our work and how it positively impacts clients. With over 12 years of experience we have been constantly providing excellent web solutions.</p>
                        <div class="row border-top border-color-dark-gray g-0">
                            <div class="col-2 text-center align-self-center">
                                <span class="text-dark-gray fs-14 fw-600">9X</span>
                            </div>
                            <div class="col-8 last-paragraph-no-margin ps-30px pe-30px pt-15px pb-15px border-start border-color-dark-gray">
                                <p class="ls-minus-05px">Site of the day - <span class="fw-600 text-dark-gray">Awwwards</span></p>
                            </div>
                            <div class="col-2 align-self-center text-center">
                                <span class="text-dark-gray fs-14 fw-600">2021</span>
                            </div>
                        </div>
                        <div class="row border-top border-color-dark-gray g-0">
                            <div class="col-2 text-center align-self-center">
                                <span class="text-dark-gray fs-14 fw-600">2X</span>
                            </div>
                            <div class="col-8 last-paragraph-no-margin ps-30px pe-30px pt-15px pb-15px border-start border-color-dark-gray">
                                <p class="ls-minus-05px">Site of the day - <span class="fw-600 text-dark-gray">CSS Design Awards</span></p>
                            </div>
                            <div class="col-2 align-self-center text-center">
                                <span class="text-dark-gray fs-14 fw-600">2020</span>
                            </div>
                        </div>
                        <div class="row border-top border-color-dark-gray g-0">
                            <div class="col-2 text-center align-self-center">
                                <span class="text-dark-gray fs-14 fw-600">4X</span>
                            </div>
                            <div class="col-8 last-paragraph-no-margin ps-30px pe-30px pt-15px pb-15px border-start border-color-dark-gray">
                                <p class="ls-minus-05px">Site of the month - <span class="fw-600 text-dark-gray">Awwwards</span></p>
                            </div>
                            <div class="col-2 align-self-center text-center">
                                <span class="text-dark-gray fs-14 fw-600">2019</span>
                            </div>
                        </div>
                        <div class="row border-top border-bottom border-color-dark-gray g-0">
                            <div class="col-2 text-center align-self-center">
                                <span class="text-dark-gray fs-14 fw-600">3X</span>
                            </div>
                            <div class="col-8 last-paragraph-no-margin ps-30px pe-30px pt-15px pb-15px border-start border-color-dark-gray">
                                <p class="ls-minus-05px">Site of the day - <span class="fw-600 text-dark-gray">The portfolio</span></p>
                            </div>
                            <div class="col-2 align-self-center text-center">
                                <span class="text-dark-gray fs-14 fw-600">2018</span>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-3 align-items-center mt-50px sm-mt-40px justify-content-center">
                            <div class="col xs-mb-30px">
                                <a href="demo-web-agency.html#"><img src="images/demo-web-agency-awards-logo-01.png" alt=""/></a>
                            </div>
                            <div class="col xs-mb-30px">
                                <a href="demo-web-agency.html#"><img src="images/demo-web-agency-awards-logo-02.png" alt=""/></a>
                            </div>
                            <div class="col">
                                <a href="demo-web-agency.html#"><img src="images/demo-web-agency-awards-logo-03.png" alt=""/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- end section -->

        <!-- start section -->
        {{-- <section class="pb-4 lg-pb-6 sm-pb-50px position-relative bg-dark-gray section-dark">
            <div class="cover-background position-absolute h-100 w-100 left-0px top-0px" style="background-image: url('images/demo-web-agency-bg-01.png')"></div>
            <div class="container position-relative">
                <div class="row justify-content-center align-items-center mb-9 xl-mb-5 sm-mb-30px" data-anime='{ "el": "childs", "translateX": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-lg-5">
                        <div class="mb-15 d-flex align-items-center md-mb-30px">
                            <div class="fw-700 fs-80 text-white me-10px">4.82</div>
                            <div class="text-center">
                                <div class="bg-base-color text-dark-gray border-radius-30px ps-20px pe-20px fs-16 ls-minus-2px">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <span class="text-white fs-13 fw-500 text-uppercase">Clutch review</span>
                            </div>
                        </div>
                        <div class="d-flex md-mb-25px">
                            <!-- start slider navigation -->
                            <div class="slider-one-slide-prev-1 bg-sherpa-blue text-white swiper-button-prev slider-navigation-style-04 w-60px h-60px"><i class="fa-solid fa-arrow-left"></i></div>
                            <div class="slider-one-slide-next-1 bg-sherpa-blue text-white swiper-button-next slider-navigation-style-04 w-60px h-60px"><i class="fa-solid fa-arrow-right"></i></div>
                            <!-- end slider navigation -->
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 overflow-hidden offset-xl-1">
                        <div class="swiper magic-cursor light" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 40, "loop": true, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "992": { "slidesPerView": 1 }, "768": { "slidesPerView":1 }, "320": { "slidesPerView": 1 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start review item -->
                                <div class="swiper-slide">
                                    <h5 class="text-white mb-20px w-90 xl-w-100 lh-42 fw-400">The <span class="text-decoration-line-bottom-medium">wonderful</span> services you offer locally are great for our community. People are tired of having to travel out of town for things.</h5>
                                    <span class="text-base-color fw-600 d-block fs-15 text-uppercase lh-22 ls-2px">@Herman miller</span>
                                </div>
                                <!-- end review item -->
                                <!-- start review item -->
                                <div class="swiper-slide">
                                    <h5 class="text-white mb-20px w-90 xl-w-100 lh-42 fw-400">Absolutely amazing theme and <span class="text-decoration-line-bottom-medium">awesome</span> design with possibilities. It's so very easy to use and to customize everything.</h5>
                                    <span class="text-base-color fw-600 d-block fs-15 text-uppercase lh-22 ls-2px">@Alexander Harad</span>
                                </div>
                                <!-- end review item -->
                                <!-- start review item -->
                                <div class="swiper-slide">
                                    <h5 class="text-white mb-20px w-90 xl-w-100 lh-42 fw-400">There are design companies and then there are user <span class="text-decoration-line-bottom-medium">experience.</span> Simply the great designs and best theme for fast loading.</h5>
                                    <span class="text-base-color fw-600 d-block fs-15 text-uppercase lh-22 ls-2px">@Jacob Kalling</span>
                                </div>
                                <!-- end review item -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="separator-line-1px w-100 bg-white opacity-1 mb-6 sm-mb-30px"></div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 clients-style-06 justify-content-center" data-anime='{ "el": "childs", "translateY": [0, 0], "scale": [1.1, 1], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start client item -->
                    <div class="col client-box text-center md-mb-40px">
                        <a href="demo-web-agency.html#"><img src="images/logo-walmart-white.svg" class="h-35px" alt=""></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="col client-box text-center md-mb-40px">
                        <a href="demo-web-agency.html#"><img src="images/logo-netflix-white.svg" class="h-35px" alt=""></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="col client-box text-center md-mb-40px">
                        <a href="demo-web-agency.html#"><img src="images/logo-invision-white.svg" class="h-35px" alt=""></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="col client-box text-center sm-mb-40px">
                        <a href="demo-web-agency.html#"><img src="images/logo-yahoo-white.svg" class="h-35px" alt=""></a>
                    </div>
                    <!-- end client item -->
                    <!-- start client item -->
                    <div class="col client-box text-center">
                        <a href="demo-web-agency.html#"><img src="images/logo-amazon-white.svg" class="h-35px" alt=""></a>
                    </div>
                    <!-- end client item -->
                </div>
            </div>
        </section> --}}
        <!-- end section -->

        <!-- start section -->
        {{-- <section class="pb-0">
            <div class="container">
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 text-center text-md-start sm-mb-20px">
                        <h2 class="fw-600 text-dark-gray mb-0 ls-minus-3px">Latest blogs</h2>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <a href="demo-web-agency-blog.html" class="btn btn-large btn-expand-ltr text-dark-gray btn-rounded fw-700"><span class="bg-base-color"></span>Explore all blogs</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-md-0">
                        <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="demo-web-agency-blog-single-creative.html"><img src="images/demo-web-agency-blog-01.jpg" alt=""></a>
                                    </div>
                                    <div class="card-body p-0 pt-30px sm-pt-20px lg-pb-20px">
                                        <span class="fs-14 text-uppercase d-block mb-5px fw-500"><a href="demo-web-agency-blog.html" class="text-dark-gray text-dark-gray-hover fw-700 categories-text">Decor</a><a href="demo-web-agency.html#" class="blog-date text-medium-gray-hover">08 August 2023</a></span>
                                        <a href="demo-web-agency-blog-single-creative.html" class="card-title fw-600 fs-17 lh-28 text-dark-gray text-dark-gray-hover d-inline-block w-95 sm-w-100">The best influencers to follow for sartorial inspiration.</a>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="demo-web-agency-blog-single-creative.html"><img src="images/demo-web-agency-blog-02.jpg" alt=""></a>
                                    </div>
                                    <div class="card-body p-0 pt-30px sm-pt-20px lg-pb-20px">
                                        <span class="fs-14 text-uppercase d-block mb-5px fw-500"><a href="demo-web-agency-blog.html" class="text-dark-gray text-dark-gray-hover fw-700 categories-text">Design</a><a href="demo-web-agency.html#" class="blog-date text-medium-gray-hover">12 August 2023</a></span>
                                        <a href="demo-web-agency-blog-single-creative.html" class="card-title fw-600 fs-17 lh-28 text-dark-gray text-dark-gray-hover d-inline-block w-95 sm-w-100">Everything you need to know about decor's big night out.</a>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="demo-web-agency-blog-single-creative.html"><img src="images/demo-web-agency-blog-03.jpg" alt=""></a>
                                    </div>
                                    <div class="card-body p-0 pt-30px sm-pt-20px lg-pb-20px">
                                        <span class="fs-14 text-uppercase d-block mb-5px fw-500"><a href="demo-web-agency-blog.html" class="text-dark-gray text-dark-gray-hover fw-700 categories-text">Decor</a><a href="demo-web-agency.html#" class="blog-date text-medium-gray-hover">20 August 2023</a></span>
                                        <a href="demo-web-agency-blog-single-creative.html" class="card-title fw-600 fs-17 lh-28 text-dark-gray text-dark-gray-hover d-inline-block w-95 sm-w-100">All the best looks &amp; moments from the met gala 2023.</a>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="demo-web-agency-blog-single-creative.html"><img src="images/demo-web-agency-blog-04.jpg" alt=""></a>
                                    </div>
                                    <div class="card-body p-0 pt-30px sm-pt-20px lg-pb-20px">
                                        <span class="fs-14 text-uppercase d-block mb-5px fw-500"><a href="demo-web-agency-blog.html" class="text-dark-gray text-dark-gray-hover fw-700 categories-text">Decor</a><a href="demo-web-agency.html#" class="blog-date text-medium-gray-hover">26 August 2023</a></span>
                                        <a href="demo-web-agency-blog-single-creative.html" class="card-title fw-600 fs-17 lh-28 text-dark-gray text-dark-gray-hover d-inline-block w-95 sm-w-100">Find a colour palettes that reflects your passion.</a>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- end section -->

        <!-- start section -->
        <section class="pb-4 sm-pt-30px sm-pb-40px overflow-hidden position-relative">
            <div class="container">
                <div class="row" data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 500, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-sm-5 text-center text-sm-start">
                        <div class="outside-box-left-25 xl-outside-box-left-10 sm-outside-box-left-0">
                            <div class="fs-350 xl-fs-250 lg-fs-200 md-fs-170 sm-fs-100 text-dark-gray fw-600 ls-minus-20px word-break-normal">Let's</div>
                        </div>
                    </div>
                    <div class="col-sm-7 text-center text-sm-end">
                        <div class="outside-box-right-5 sm-outside-box-right-0">
                            <div class="fs-350 xl-fs-250 lg-fs-200 md-fs-170 sm-fs-100 text-base-color fw-600 ls-minus-20px position-relative d-inline-block word-break-normal">Partner
                                {{-- <div class="position-absolute left-minus-140px top-minus-140px z-index-9 xl-left-minus-110px top-minus-140px xl-top-minus-100px md-top-minus-90px z-index-9 xl-w-230px md-w-200px d-none d-md-block" data-anime='{ "translateY": [-15, 0], "scale": [0.5, 1], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                    <img src="images/demo-web-agency-05.png" class="animation-rotation" alt="">
                                    <div class="absolute-middle-center w-100 z-index-minus-1"><img src="images/demo-web-agency-04.png" alt=""></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start footer -->
        <footer class="p-0">
            <div class="container">
                <div class="row align-items-center mb-4 sm-mb-6">
                    <div class="col-md-10 col-sm-8 text-center text-sm-start xs-mb-25px">
                        <h5 class="mb-0 text-dark-gray fw-400 ls-minus-1px outfit-semi-bold">Ready to create impactful solutions together? <a href="#" class="text-decoration-line-bottom-medium fw-600 text-dark-gray text-dark-gray-hover outfit-bold">Contact Us</a></h5>
                    </div>

                </div>
                <div class="row align-items-end mb-6 sm-mb-40px">
                    <!-- start footer column -->
                    <div class="col-lg-3 col-sm-4 text-center text-sm-start xs-mb-25px last-paragraph-no-margin">
                        <span class="d-block text-dark-gray ls-minus-05px mb-5px fw-600 outfit-semi-bold">Cloudence - Abuja</span>
                        <p class="w-80 lg-w-100 text-medium-gray fs-15 lh-28 outfit-regular">FHA Apo-Guzape Estate, Guzape Hills, Abuja</p>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-3 col-sm-4 text-center text-sm-start xs-mb-25px last-paragraph-no-margin">
                        <span class="d-block text-dark-gray ls-minus-05px mb-5px fw-600 outfit-semi-bold">Cloudence - Calabar</span>
                        <p class="w-80 lg-w-100 text-medium-gray fs-15 lh-28 outfit-regular">105 IBB Way, Calabar, Cross River State</p>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-md-3 col-sm-4 last-paragraph-no-margin ms-auto text-center text-sm-end">
                        <a href="tel:1235678901" class="text-dark-gray d-block lh-18 text-dark-gray-hover outfit-regular">+23480 6229 5588</a>
                        <a href="#" class="text-dark-gray text-dark-gray-hover fw-600 text-decoration-line-bottom outfit-regular">hello@cloudence.com.ng</a>
                    </div>
                    <!-- end footer column -->
                </div>
            </div>
            <div class="footer-bottom pt-25px pb-25px border-top border-color-charcoal-grey">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 text-center text-lg-start md-mb-10px">
                            <ul class="footer-navbar fw-600 fs-16">
                                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link outfit-regular">Home</a></li>
                                <li class="nav-item"><a href="#" class="nav-link outfit-regular">Why Cloudence</a></li>
                                <li class="nav-item"><a href="#" class="nav-link outfit-regular">Our Products</a></li>
                                <li class="nav-item"><a href="#" class="nav-link outfit-regular">Our Services</a></li>
                                <li class="nav-item"><a href="#" class="nav-link outfit-regular">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-5 text-center text-lg-end">
                            <span class="fs-15 outfit-regular">&copy; 2025 Cloudence Nig Ltd </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->


        <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
            <a href="#" class="scroll-top" aria-label="scroll">
                <span class="scroll-text">Scroll to top</span><span class="scroll-line"><span class="scroll-point"></span></span>
            </a>
        </div>
        <!-- end scroll progress -->
        <!-- javascript libraries -->
        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/vendors.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
