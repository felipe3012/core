<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title')
        </title>
        @include('layouts.css')
    </head>
    <body style="background-color: #ffffff;">
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.js')
        @yield('script')
    </body>
</html>
