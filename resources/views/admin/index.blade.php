<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">
    @vite(['resources/sass/admin.scss','resources/sass/style.scss', 'resources/js/login.js'])
    <title>Адміністратор</title>
  </head>
  <body>
    <!-- (A) SIDEBAR -->
    <div id="pgside">
      <!-- (A1) BRANDING OR USER -->
      <!-- LINK TO DASHBOARD OR LOGOUT -->
      <div id="pguser">
        <img src="{{asset('images/staff/dog3.jpg')}}">
        <i class="txt">Адміністратор</i>
      </div>
      <a href="/" class="nav-button">Повернутися на сайт</a>
      <!-- (A2) MENU ITEMS -->
      <a href="{{asset('/admin')}}" class="links">
        <i class="ico">&#129464;</i>
        <i class="txt">Співробітники</i>
      </a>
      <a href="{{asset('/admin/news')}}" class="links">
        <i class="ico">&#128240;</i>
        <i class="txt">Новини</i>
      </a>
      <a href="{{asset('/admin/documents')}}" class="links">
        <i class="ico">&#128203;</i>
        <i class="txt">Документи</i>
      </a>
      <a href="{{asset('/admin/photos')}}" class="links">
        <i class="ico">&#128248;</i>
        <i class="txt">Галерея</i>
      </a>
      <a href="{{asset('/admin/projects')}}" class="links">
        <i class="ico">&#128202;</i>
        <i class="txt">Проекти</i>
      </a>

    </div>

    <!-- (B) MAIN -->
    <main id="pgmain">
        @yield('content')
    </main>
  </body>
</html>