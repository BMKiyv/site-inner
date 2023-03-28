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
            <a href="" class="nav-item"><span>Документи</span></a>
            <a href="/#departments" class="nav-item"><span>Відділи</span></a>
            <a href="" class="nav-item"><span>Проекти</span></a>
            <a href="/#news" class="nav-item"><span>Новини / оголошення</span></a>
            <a href="" class="nav-item"><span>Інше</span></a>
            <a href="" class="nav-button"><span>Кабінет</span></a>
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
                <div class="footer-item"><a href="#" class="footer-content"><img src="/images/icons/location.png" alt="" class="footer-icon"><span>Київ, вул. Прорізна 2</span></a></div>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-item padding">Соцмережі</div>
                <div class="footer-item-center">
                    <a href="https://www.facebook.com/DARTUkraine" class="footer-link"><img src="/images/icons/facebook.png" alt="facebook" class="footer-icon-center"></a>
                    <a href="" class="footer-link"><img src="/images/icons/insta.png" alt="instagram" class="footer-icon-center"></a>
                    <a href="https://www.linkedin.com/company/dartukraine/" class="footer-link"><img src="/images/icons/linkedin.png" alt="linkedin" class="footer-icon-center"></a>
                    <a href="" class="footer-link"><img src="/images/icons/t-net.png" alt="" class="footer-icon-center"></a>
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
</body>

</html>