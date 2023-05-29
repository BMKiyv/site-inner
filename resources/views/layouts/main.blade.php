<!DOCTYPE html>
<html lang="en">

<head>
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--====== Title ======-->
  <title>@yield('title')</title>

  @vite(['./resources/sass/style.scss','./resources/js/app.js'])
</head>

<body>
<header class="header">
    <div class="container flex-container">
        <a href="/"><img class="logo" src="/images/logo.svg" alt="logo"></a>
        <nav class="navigation">
            <div class="nav-item drop-menu"><span>Документи</span></div>
            <div class="documents"></div>
            <a href="/#departments" class="nav-item"><span>Відділи</span></a>
            <div class="nav-item drop-menu"><span>Проекти</span></div>
            <div class="projects"></div>
            <a href="/#news" class="nav-item"><span>Новини / оголошення</span></a>
            <a href="/photos" class="nav-item"><span>Інше</span></a>
            @if(Auth::user())           
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit" class="nav-button"><span>Вийти</span></button>
            </form>
            @endif
            @if(!Auth::user())  
                <a href="/login" class="nav-button"><span>Кабінет</span></a>
            @endif
            @if(Auth::user() && Auth::user()->is_admin)
            <a href="/admin" class="nav-button"><span>Admin</span></a>
            @endif
        </nav>
    </div>
</header>
 
  @yield('content')

    <footer class="footer">
        <div class="container footer-wrap">
            <div class="footer-column">
                <div class="footer-item padding">Контакти</div>
                <div class="footer-item-center">
                <div class="footer-item"><a href="tel:+380505555555" class="footer-content"><img class="footer-icon" src="/images/icons/phone.png" alt="phone"><span>+38 050 555 55 55</span></a></div>
                <div class="footer-item" id="map"><a href="#" class="footer-content"><img src="/images/icons/location.png" alt="" class="footer-icon"><span>Київ, вул. Прорізна 2</span></a></div>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-item padding">Соцмережі</div>
                <div class="footer-item-center">
                    <a href="https://www.facebook.com/DARTUkraine" class="footer-link"><img src="/images/icons/facebook.png" alt="facebook" class="footer-icon-center"></a>
                    <a href="/" class="footer-link"><img src="/images/icons/insta.png" alt="instagram" class="footer-icon-center"></a>
                    <a href="https://www.linkedin.com/company/dartukraine/" class="footer-link"><img src="/images/icons/linkedin.png" alt="linkedin" class="footer-icon-center"></a>
                    <a href="/" class="footer-link"><img src="/images/icons/t-net.png" alt="" class="footer-icon-center"></a>
                    <a href="https://m.youtube.com/@user-qm9kr1wt5j" class="footer-link"><img src="/images/icons/youtube.png" alt="youtube" class="footer-icon-center"></a>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-item footer-item-last">
                    <a href="https://tourism.gov.ua" class="footer-site-flex"><img class="footer-icon" src="/images/icons/site.png" alt="site"><span class="footer-site">Наш сайт</span></a>
                    <span class="footer-content">ДАРТ України, 2023</span>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-map">
        <div class="footer-map-close"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.6238166861554!2d30.519501715094613!3d50.44810729541566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce56d364c989%3A0x218b5ccfe12acf80!2z0LLRg9C70LjRhtGPINCf0YDQvtGA0ZbQt9C90LAsIDIsINCa0LjRl9CyLCAwMjAwMA!5e0!3m2!1suk!2sua!4v1680017313611!5m2!1suk!2sua" class="footer-map-frame" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</body>

</html>