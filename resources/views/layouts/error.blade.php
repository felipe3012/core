
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('name')</title>
   @include('layouts.css')
</head>
<body>
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>@yield('code')</h1>
                <h3 class="text-uppercase">@yield('title')</h3>
                <p class="text-muted m-t-30 m-b-30">@yield('subtitle')</p>
                <a href="{!!url('/')!!}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Regresar al inicio</a> </div>
            <footer class="footer text-center">2017 © Hts todos los derechos reservados.</footer>
        </div>
    </section>
   @include('layouts.js')
</body>

</html>
