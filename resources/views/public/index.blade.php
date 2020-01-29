<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Engineering and Construction Ethiopia') }}</title>

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700"
        rel="stylesheet">
    <link href="{{asset('assets/public/asset/css/bootstrap.min.css')}}" rel="stylesheet" />
    {{-- <link href="{{asset('assets/public/asset/css/bootstrap.css')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{asset('assets/public/asset/css/bootstrap-responsive.css')}}" rel="stylesheet" /> --}}
    <link href="{{asset('assets/public/asset/css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/public/asset/css/jcarousel.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/public/asset/css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/public/asset/css/custom.css')}}" rel="stylesheet" />

</head>

<body>
    <div id="app">
        <!-- start header -->
        <header>
            {{-- Main navbar for desktop --}}
            <div class="d-none d-lg-block">
                <nav class="container navbar navbar-expand-lg navbar-light">

                    <div class="d-block">
                        <router-link class="navbar-brand" to="/"><img
                                src="{{asset('assets/public/asset/img/logo.jpg')}}" alt="ECEthiopia" class="brand-image"
                                height="75"></router-link>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <router-link class="nav-link" to="/blog">Blog</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" to="/vacancy">Vacancy</router-link>
                            </li>
                            {{-- <li class="nav-item">
                                <router-link class="nav-link" to="/documents">Documents</router-link>
                            </li> --}}
                            @guest
                            <li class="nav-item">
                                <router-link class="nav-link" to="/login">Login</router-link>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name}}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>

            {{-- Main navbar for mobile --}}
            <div class="d-lg-none">
                <nav class="container navbar navbar-expand-lg navbar-light">
                    <div class="d-block">
                        <router-link class="navbar-brand" to="/"><img
                                src="{{asset('assets/public/asset/img/logo.jpg')}}" alt="ECEthiopia" class="brand-image"
                                height="60"></router-link>
                    </div>

                    <div class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <router-link class="nav-link" to="/login">Login</router-link>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name}}<span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </div>
                </nav>

                <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
                    <li class="nav-item">
                        <router-link class="nav-link active" data-toggle="tab" to="/blog" role="tab"
                            aria-selected="true">Blog</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" data-toggle="tab" to="/vacancy" role="tab" aria-selected="false">
                            Vacancy</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" data-toggle="tab" to="/professionals" role="tab"
                            aria-selected="false">Professionals</router-link>
                    </li>
                </ul>
            </div>
        </header>
        <!-- end header -->
        {{-- vue router --}}
        <home-main></home-main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget">
                            <h5 class="widgetheading">Browse pages</h5>
                            <ul class="link-list">
                                <li>
                                    <router-link to="/blog">Blog</router-link>
                                </li>
                                <li>
                                    <router-link to="/vacancy">Vacancy</router-link>
                                </li>
                                <li>
                                    <router-link to="/professionals">Professionals</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="widgetheading">Important stuff</h5>
                        <ul class="link-list">
                            <li>
                                <router-link to="#">Latest Posts</router-link>
                            </li>
                            <li>
                                <router-link to="#">Terms and conditions</router-link>
                            </li>
                            <li>
                                <router-link to="#">Privacy policy</router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h5 class="widgetheading">Get in touch with us</h5>
                            <address>
                                <strong>ECEthiopia, Engineering and Construction Ethiopia</strong><br>
                                Addis Ababa, Bole Wollo Sefer<br>
                                Ethiopia
                            </address>
                            <p>
                                {{-- <i class="icon-phone"></i> (+251) 913-635892 <br> --}}
                                <i class="icon-envelope-alt"></i> ecethiopia@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright">
                                <p>
                                    <span>&copy; ECEthiopia - All right reserved.</span>
                                </p>
                                {{-- <div class="credits">
                                    Designed by <a href="https://zematechs.com/" target="_blank">Zema
                                        Technologies</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="social-network">
                                <li><a href="#" data-placement="bottom" title="Facebook"><i
                                            class="icon-facebook icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Twitter"><i
                                            class="icon-twitter icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Linkedin"><i
                                            class="icon-linkedin icon-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets/public/asset/js/jquery.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jcarousel/jquery.jcarousel.min.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.fancybox-media.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/google-code-prettify/prettify.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/portfolio/jquery.quicksand.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/portfolio/setting.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.flexslider.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.nivo.slider.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/modernizr.custom.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.ba-cond.min.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/jquery.slitslider.js')}}"></script>
    <script src="{{asset('assets/public/asset/js/animate.js')}}"></script>

    <!-- Template Custom JavaScript File -->
    <script src="{{asset('assets/public/asset/js/custom.js')}}"></script>

</body>

</html>
