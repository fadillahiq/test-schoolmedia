<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', config('app.name'))</title>

    <!-- General CSS Files -->
    @include('includes.head')
    <!-- CSS Libraries -->
    @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('partials.navbar')
      <div class="main-sidebar">
        @include('partials.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            @yield('header')
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      @include('partials.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  @include('includes.script')
  @stack('script')
  <!-- Page Specific JS File -->
</body>
</html>
