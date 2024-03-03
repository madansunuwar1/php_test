<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="author" content="" />
    <meta name="description"
        content="The APCC, which has implemented its projects for 20 years since 1989 and celebrates the 10th anniversary of the creation of the BRIDGE CLUB" />

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet" />

<!-- Core Style -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />

<!-- Font Icons -->
<link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" />

<!-- Plugins/Components CSS -->
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}" />


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>BCIO | Bridge club international organization</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
</head>

<body class="stretched">
    <!-- Document Wrapper
============================================= -->
<div id="wrapper">
        <!-- Header
      ============================================= -->
        <header id="header" class="header-size-sm">
            <div id="top-bar">
                <div class="container">
                    <div class="header-row justify-content-between justify-content-lg-start">
                        <!-- Logo
                              ============================================= -->
                        <div id="logo" class="me-0 me-lg-auto">
                            <a href="/">
                                <img class="logo-default" src="images/logo/bcio.svg" alt="BCIO Logo" />
                                <img class="logo-dark" src="images/logo/bcio.svg" alt="BCIO Logo" />
                            </a>
                        </div>
                        <!-- #logo end -->

                        <div class="header-misc order-lg-last">
                            <ul class="header-extras me-0 me-sm-4">
                                <li>
                                    <a href="#" class="button bg-yellow border rounded">Reg &nbsp | &nbsp Lang</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="header-wrap" class="border-top border-f5">
                <div class="container">
                    <div class="header-row justify-content-end justify-content-lg-center">
                    @guest
                        <div class="header-misc">
                            <a href="{{ route('login') }}" class="button bg-primary border rounded"><i
                                    class="fa-solid fa-arrow-right-to-bracket me-3"></i>Login</a>
                        </div>
                        @else
                        <div class="header-misc">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="button bg-primary border rounded">
            <i class="fa-solid fa-arrow-right-to-bracket me-3"></i>Logout
        </button>
    </form>
</div>
@endguest


                        <div class="primary-menu-trigger">
                            <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                            </button>
                        </div>

                        <!-- Primary Navigation
                              ============================================= -->
                        <nav class="primary-menu">
                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="/">
                                        <div>BCIO</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <div>BRIDGE CLUB</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" href="#">
                                        <div>Common Activity</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" href="#">
                                        <div>Official Documents</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" href="#">
                                        <div>Applications</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="shop.html">
                                        <div>BCPN</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" href="#">
                                        <div>APCC</div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- #primary-menu end -->
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header>
        <!-- #header end -->
 @yield('content')

         <!-- #content end -->
         <footer id="footer" class="border-width-1 border-f5 block-footer-1">
            <div class="container">
                <!-- Footer Widgets
                  ============================================= -->
                <div class="footer-widgets-wrap">
                    <div class="row col-mb-50">
                        <div class="col-sm-4">
                            <div class="widget">
                                <img src="images/logo/bcio.svg" alt="Image" class="footer-logo" />
                                <a href="#" class="button bg-transparent border rounded">Inquiry</a>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="row">
                                <div class="offset-lg-3 col-lg-3 col-6">
                                    <div class="widget widget_links">
                                        <h4 class="text-transform-none ls-0">About Us</h4>

                                        <ul>
                                            <li><a href="#">Feedback</a></li>
                                            <li><a href="#">Plugins</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="widget widget_links">
                                        <h4 class="text-transform-none ls-0">How we do</h4>

                                        <ul>
                                            <li><a href="#">Plugins</a></li>
                                            <li><a href="#">Support Forums</a></li>
                                            <li><a href="#">Themes</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6 mt-3 mt-md-0">
                                    <div class="widget widget_links">
                                        <h4 class="text-transform-none ls-0">Resources</h4>

                                        <ul>
                                            <li><a href="#">Feedback</a></li>
                                            <li><a href="#">Plugins</a></li>
                                            <li><a href="#">Support Forums</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .footer-widgets-wrap end -->
            </div>

            <!-- Copyrights
			============================================= -->
            <div id="copyrights" class="bg-light">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-4 text-center text-md-center">
                            &copy; 2023 All Rights Reserved by BCIO Inc.<br />
                        </div>

                        <div class="col-md-4 text-center text-md-end">
                            <div class="copyright-links">
                                <a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #copyrights end -->
        </footer>
        <!-- #footer end -->
    </div>
    <!-- #wrapper end -->

 <!-- Go To Top
============================================= -->
<div id="gotoTop" class="uil uil-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="{{ asset('js/plugins.min.js') }}"></script>
<script src="{{ asset('js/functions.bundle.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>