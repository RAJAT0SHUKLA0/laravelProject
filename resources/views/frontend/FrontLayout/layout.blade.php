@include('frontend.FrontLayout.header')

@yield('content')
@flasher_render()
@include('frontend.FrontLayout.footer')