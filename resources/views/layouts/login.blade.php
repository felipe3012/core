<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
@include('layouts.css')
    </head>
    <body>
        <!-- Preloader -->
        <div class="preloader" >
            <div class="cssload-speeding-wheel">
            </div>
        </div>
        <nav class="navbar navbar-static-top m-b-0" style="background-color: #001827;">
       <h3 class="hidden-xs" style="color: white; margin-left: 15px;font-weight: bold; font-family: Poppins, sans-serif;">
       ADMINISTRACIÓN Y CONTROL DE INCIDENCIAS TECNICAS</h3>
        <h3 class="hidden-lg" style="color: white; margin-left: 15px;font-weight: bold; font-family: Poppins,sans-serif;">
       ACIT</h3>
        </nav>
        <section class="login-register" id="wrapper">
            <div class="login-box">
                <div class="white-box">
                    @yield('content')
                </div>
            </div>
        </section>
            <footer class="footer text-center"  style="background-color: rgba(0,0,0,0.6);color: white;"> 2017 &copy; <a style="color: white;" target="_blank" href="https://solucioneshts.com">Soluciones HTS</a> </footer>
        @include('layouts.js')
        @include('alerts.notifications')
        @yield('script')
    </body>
</html>
