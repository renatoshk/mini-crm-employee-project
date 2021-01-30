<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('adm', app()->getLocale())}}" class="nav-link">Home</a>
        </li>
         <li class="nav-item d-none d-sm-inline-block">
           <languange-switcher
                locale="{{ app()->getLocale() }}"
                link-en="{{ route(Route::currentRouteName(), 'en') }}"
                link-al="{{ route(Route::currentRouteName(), 'al') }}"
            >
            </languange-switcher>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
