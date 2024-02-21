<!doctype html>
<html lang="fr" class="no-js">

@include('layouts.front.head')

<body class="boxed">
    <!-- Container -->
    <div id="container">
        @include('layouts.front.nav')

        @yield('content')
        
        @include('layouts.front.footer')
        @include('layouts.front.js')
    </div>
</body>

</html>
