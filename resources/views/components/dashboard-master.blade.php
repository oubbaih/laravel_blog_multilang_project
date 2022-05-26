   <!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
   <!DOCTYPE html>
   <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir=" {{ LaravelLocalization::getCurrentLocaleDirection() }}">

   <head>
       <meta charset="utf-8" />
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       <meta name="description" content="CoreUI Bootstrap 4 Admin Template" />
       <meta name="author" content="Lukasz Holeczek" />
       <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template" />
       <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
       <title>Multi-lang Dashboard For My Blog</title>
       <!-- Icons -->
       <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
       <link href="{{asset('css/simple-line-icons.css')}}"" rel=" stylesheet" />
       <!-- Main styles for this application -->
       <link href="{{asset('css/style.css')}}" rel="stylesheet" />
       @yield('styles')

   </head>
   <!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

   <body class="navbar-fixed sidebar-nav fixed-nav">

       {{-- Start Header (Includes - Top Navbar ) --}}
       <header class="navbar">
           <div class="container-fluid">
               <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">
                   &#9776;
               </button>
               <a class="navbar-brand" href="{{route('home')}}">Home</a>
               <ul class="nav navbar-nav hidden-md-down">
                   <li class="nav-item">
                       <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                   </li>

                   <li class="nav-item p-x-1">
                       <a class="nav-link" href="/dashboard">Dashboard</a>
                   </li>
                   <li class="nav-item p-x-1">
                       <a class="nav-link" href="{{route('dashboard.user.index')}}">Users</a>
                   </li>
                   <li class="nav-item p-x-1">
                       <a class="nav-link" href="{{route('dashboard.setting.index')}}">Settings</a>
                   </li>
                   <li class="nav-item p-x-1" style="text-transform:capitalize;">
                      {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-expanded="false">
                           Languages
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                           <li class="nav-item"> <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                   {{ $properties['native'] }}
                               </a>
                           </li>
                           @endforeach
                

                       </ul> 
                      
                   </li>
               </ul>
               <ul class="nav navbar-nav pull-left hidden-md-down">
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">
                           {{-- <img
                                src="img/avatars/6.jpg"
                                class="img-avatar"
                                alt="admin@bootstrapmaster.com"
                            /> --}}
                           <span class="hidden-md-down">{{auth()->user()->status}}</span>
                       </a>
                       <div class="dropdown-menu dropdown-menu-right">
                           <div class="dropdown-header text-xs-center">
                               <strong>Account</strong>
                           </div>
                           <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span
                                   class="tag tag-info">42</span></a>
                           <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span
                                   class="tag tag-success">42</span></a>
                           <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span
                                   class="tag tag-danger">42</span></a>
                           <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span
                                   class="tag tag-warning">42</span></a>
                           <div class="dropdown-header text-xs-center">
                               <strong>Settings</strong>
                           </div>

                           <a class="dropdown-item" href="{{route('dashboard.setting.index')}}"><i
                                   class="fa fa-wrench"></i> Settings</a>

                           <div class="divider"></div>

                           {{-- //Logout Setup --}}
                           <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                               <i class="fa fa-lock"></i>
                               {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>

                       </div>
                   </li>
               </ul>
           </div>
       </header>

       {{-- End Header (Includes - Top Navbar ) --}}



       {{-- Start SideBare Right  --}}
       <div class="sidebar">
           @include('includes.sidebar')
       </div>

       {{-- End SideBare Right  --}}



       <!-- Main content -->
       <main class="main">
           <div class="container-fluid">
               <div class="breadcrumb">
                   <div class="row">
                       @yield('main')
                   </div>
               </div>
           </div>
       </main>
       {{-- End Main Content  --}}

       <footer class="footer">
           <span class="text-left">
               <a href="#">Lahcen</a> &copy; 2016 lahcenoubbaih.
           </span>
           <span class="pull-right">
               Powered by <a href="#">Lahcen Oubbaih</a>
           </span>
       </footer>
       <!-- Bootstrap and necessary plugins -->
       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/libs/tether.min.js')}}"></script>
       <script src="{{asset('js/libs/bootstrap.min.js')}}"></script>
       <script src="{{asset('js/libs/pace.min.js')}}"></script>

       <!-- Plugins and scripts required by all views -->
       <script src="{{asset('js/libs/Chart.min.js')}}"></script>

       <!-- CoreUI main scripts -->

       <script src="{{asset('js/app.js')}}"></script>

       <!-- Plugins and scripts required by this views -->
       <!-- Custom scripts required by this view -->
       <script src="{{asset('js/views/main.js')}}"></script>

       {{-- Yarja DataTable Script SetUp --}}
       @stack('javascript')

       <!-- Grunt watch plugin -->
       <!-- <script src="//localhost:35729/livereload.js"></script> -->
       @yield('scripts')
   </body>

   </html>
