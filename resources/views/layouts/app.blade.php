<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page') - {{ config('app.name', 'Ticketit') }}</title>
      
         <link rel="icon" type="image/x-icon" href="{{ asset('main_assets/images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('main_assets/css/style.css') }}">

         <link rel="stylesheet" type="text/css" href="{{ asset('main_assets/css/ticket.css') }}">
       
       <link rel="stylesheet" type="text/css" href="{{ asset('main_assets/css/searchpage.css') }}">
      
       <link rel="stylesheet" type="text/css" href="{{ asset('main_assets/css/blog.css') }}">
       <link rel="stylesheet" type="text/css" href="{{ asset('main_assets/css/bootstrap.min.css') }}">
       <link href="{{ asset('main_assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
      
      <link rel='stylesheet' id='slick-css-css' href="{{ asset('main_assets/css/slick.css') }}">
       
      <link rel="stylesheet" type="text/css" href="{{ asset('main_assets/css/yearpicker.css') }}">
       
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css">

      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js"></script> 
      <script src="{{ asset('main_assets/js/popper.min.js')}}"></script>
      <script src="{{ asset('main_assets/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('main_assets/js/bootstrap.min.js')}}"></script>

</head>
<style type="text/css">
   
.Browse_cat a:hover {text-decoration: none;color: black !important;background-color: #e2e2e2!important;}

.Browse_cat a {text-decoration: none;color: black!important;font-size: 15px !important;}

.soft_submenu .alink{font-size: 14px !important;padding: 10px 14px!important;}

.excalmetric{font-size: 20px;font-weight: 300;}
.new_head{padding-left: 32px;padding-right: 32px;}
</style>
<body>
    <div id="app">
         <!-- //============================================
           Header Start 
   =============================================// -->
       <!-- Mobile Menu -->
      <div class="mobile-menu-container">
        <div class="mobile-menu-close"></div>
        <div id="mobile-menu-wrap"></div>
      </div>
      <!-- Mobile Menu End -->
      <header class="header header-sticky">
        <!--// Main header -->
        <div class="main-header">
          <div class="container">
          <!--   <nav class="navbar navbar-expand-lg p-0 main-navigation"> -->
            <nav class="navbar p-0 main-navigation">
              <!--  Show this only on mobile to medium screens  -->
              <a class="navbar-brand" href="{{url('/')}}"> <img src="{{ asset('main_assets/images/truefirms_logo.png') }}" alt="TrueFirms" class="logo-blue" width="80"> </a>
              <!-- <button class="mobile-menu-trigger"> <span></span> <span></span> <span></span> </button> -->

              
              <!--  Use flexbox utility classes to change how the child elements are justified  -->
              <div class="header-navigation-area justify-content-between new_head">
                <ul id="main-menu" class="menu m-0">
                  

                 <?php
                     $check = Auth::user();
                     $check = Auth::check(); 

                      if($check){
                        $type = Auth::user()->user_type;
                      }
                      else{
                        $type = 1;
                      }  

                      if($type != 2 && $type != 3){ ?>  
     
                      <!-- <li><a href="{{url('review')}}">Leave a review</a></li> -->

                  <?php  } ?>
                   <!-- <li><a href="{{url('review')}}">Leave a review</a></li> -->
                   <?php 
                   $aurl = request()->getHost();;
                   ?>
                   
                  <!-- <li><a href="https://{{ $aurl }}/blog">Blog</a></li> -->
                  <li><a href="https://{{ $aurl }}"class="login-signup" onclick="window.close();"><i class="fa fa-arrow-left" ></i> Back to Truefirms main site</a></li>
                  
                </ul>
              </div>
              <?php if($check){ ?>
               <div class="right-navigation-area">
                <ul id="right-menu" class="menu m-0">
                    <li class="dropdown"><a id="navbarDropdown" class="menu-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><?php echo ucfirst(substr(Auth::user()->name,0,1)); ?> <span class="caret"></span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
              </div>
              <?php } ?>      
            </nav>
          </div>
        </div>
        <!--// Main End -->
      </header>
      <!-- //============================================
               Header End
      =============================================// -->

        <main class="py-4" style="margin-top: 80px;">
            @yield('auth_content')
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('footer')
</body>
</html>
