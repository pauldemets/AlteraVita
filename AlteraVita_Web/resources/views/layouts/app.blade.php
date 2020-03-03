<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
    @include('cookieConsent::index')
    {!! NoCaptcha::renderJs() !!}
</head>

<body>
    <div id="page-container">
        <header>
            @include('includes.header')
        </header>

        @yield('content')
    </div>

    <footer>
        @include('includes.footer')
    </footer>
    <script src="@yield('script')"></script>
</body>

</html>