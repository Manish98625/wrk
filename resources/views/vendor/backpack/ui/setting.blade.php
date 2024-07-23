{{--  @extends(backpack_view('layouts.top_left'))

@php
    // Merge widgets that were fluently declared with widgets declared without the fluent syntax:
    // - $data['widgets']['before_content']
    // - $data['widgets']['after_content']
    if (isset($widgets)) {
        foreach ($widgets as $section => $widgetSection) {
            foreach ($widgetSection as $key => $widget) {
                \Backpack\CRUD\app\Library\Widget::add($widget)->section($section);
            }
        }
    }
@endphp

@section('before_breadcrumbs_widgets')
    @include(backpack_view('inc.widgets'), [
        'widgets' => app('widgets')->where('section', 'before_breadcrumbs')->toArray(),
    ])
@endsection

@section('after_breadcrumbs_widgets')
    @include(backpack_view('inc.widgets'), [
        'widgets' => app('widgets')->where('section', 'after_breadcrumbs')->toArray(),
    ])
@endsection

@section('before_content_widgets')
    @include(backpack_view('inc.widgets'), [
        'widgets' => app('widgets')->where('section', 'before_content')->toArray(),
    ])
@endsection

@section('content')
@endsection

@section('after_content_widgets')
    @include(backpack_view('inc.widgets'), [
        'widgets' => app('widgets')->where('section', 'after_content')->toArray(),
    ])
@endsection  --}}

<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ backpack_theme_config('html_direction') }}">

<head>
  @include(backpack_view('inc.head'))

</head>

<body class="{{ backpack_theme_config('classes.body') }}">

  @include(backpack_view('inc.sidebar'))

  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    
    @include(backpack_view('inc.main_header'))

    <div class="app-body flex-grow-1 px-2">

    <main class="main">

       @yield('before_breadcrumbs_widgets')

       @includeWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'))

       @yield('after_breadcrumbs_widgets')

       @yield('header')

        <div class="container-fluid animated fadeIn">

          @yield('before_content_widgets')

          @yield('content')
          
          @yield('after_content_widgets')

        </div>

    </main>

  </div>{{-- ./app-body --}}

  <footer class="{{ backpack_theme_config('classes.footer') }}">
    @include(backpack_view('inc.footer'))
  </footer>
  </div>

  @yield('before_scripts')
  @stack('before_scripts')

  @include(backpack_view('inc.scripts'))
  @include(backpack_view('inc.theme_scripts'))

  @yield('after_scripts')
  @stack('after_scripts')
</body>
</html>
