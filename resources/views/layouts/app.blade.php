<!doctype html>
<html lang="en">
  <head>
    @include('includes.meta')

    @stack('before-styles')
    @include('includes.styles')
    @stack('after-styles')

    <title>{{ env('APP_NAME') }}</title>
  </head>
  <body>
    @include('includes.navbar')

    <div class="container py-4">
      @yield('content')
    </div>
    
    @include('includes.footer')

    @stack('before-scripts')
    @include('includes.scripts')
    @stack('after-scripts')
  </body>
</html>