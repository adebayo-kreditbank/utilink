<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name') }}</title>

    @stack('styles')
    @stack('javascript')

</head>



<body>

    <div>

        <div>
            <div id="content">
                <!-- TopBar -->
                @include('layouts.nav.topbar')
                <!-- Topbar -->
                
                <br>

                <!-- Container Fluid-->
                <div id="@yield('containerDivId')" class="container-fluid @yield('extraContainerClass')">
                    @yield('content')
                </div>
                <!---Container Fluid-->
            </div>

            <!-- Footer --><!-- Footer -->
        </div>
        
    </div>
</body>

</html>
