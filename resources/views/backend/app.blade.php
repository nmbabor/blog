@include('backend._partials.header')
@include('backend._partials.sidebar')
<div id="page-wrapper">
@yield('content')
</div>

@include('backend._partials.footer')
@yield('script')

</body>

</html>