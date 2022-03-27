@include('includes.header')
@include('includes.topbar')

<!-- ========== Left Sidebar Start ========== -->
@include('includes.sidebar')
<!-- Left Sidebar End -->

    @yield('content')
    @include('includes.footer')
