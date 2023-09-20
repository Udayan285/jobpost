<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive bootstrap admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard - Rubick - Bootstrap HTML Admin Template</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}"/>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
    
        <div class="d-flex">
            
            
                     <!-- BEGIN: Side Menu -->
         <nav class="side-nav">
            <a href="index.html" class="intro-x d-flex align-items-center ps-5 pt-4">
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src={{ asset('backend/dist/images/logo.svg') }}>
                <span class="d-none d-xl-block text-white fs-lg ms-3"> Job<span class="fw-medium">Post</span> </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            
            {{-- @yield("sidebarContent") --}}
            @include("backend.sidebar")
        </nav>
        <!-- END: Side Menu -->

            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="index.html">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('home') }}" class="breadcrumb--active">Dashboard</a><i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route("homePage") }}">Home</a>  </div>
                    <!-- END: Breadcrumb -->

                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-pill overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-bs-toggle="dropdown">
                            <img alt="Udayan_Project" src="{{ auth()->user()->profile_url ? auth()->user()->profile_url : "https://api.dicebear.com/7.x/initials/svg?seed=".str(auth()->user()->name)->headline()   }}">
                        </div>
                        <div class="dropdown-menu w-56">
                            <ul class="dropdown-content bg-theme-26 dark-bg-dark-6 text-white">
                                <li class="p-2">
                                    <div class="fw-medium text-white">{{ str(auth()->user()->name)->headline() }}</div>
                                    <div class="fs-xs text-theme-28 mt-0.5 dark-text-gray-600">{{ auth()->user()->designation }}</div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
                                </li>
                                <li>
                                    <a href="{{ route('profile') }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="user" class="w-4 h-4 me-2"></i> Profile </a>
                                </li>
                                {{-- <li>
                                    <a href="index.html" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="edit" class="w-4 h-4 me-2"></i> Add Account </a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('profile.passwordChange') }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="lock" class="w-4 h-4 me-2"></i> Reset Password </a>
                                </li>
                               
                                <li>
                                    <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
                                </li>
                                <li>
                                   
                                        
                                
                                               <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i data-feather="toggle-right" class="w-4 h-4 me-2" style="cursor: pointer;"></i>{{ __('Log Out') }}
                            </a>
                        </form>
                      
                                
                                    </li>

                 

                            </ul>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>




                
                <!-- END: Top Bar -->



                @yield('backendContent')



                
            </div>
            <!-- END: Content -->

        </div>

        
        
        <!-- BEGIN: JS Assets-->
      
        @stack('customs')
        @stack('imgview')
        @stack('customdesc')

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG7gNHAhDzgYmq4-EHvM4bqW1DNj2UCuk&libraries=places"></script>
        <script src={{ asset('backend/dist/js/app.js') }}></script>
     
        <!-- END: JS Assets-->
    </body>
</html>