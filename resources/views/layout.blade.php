@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Night Mate</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand mx-5" href="{{route('home')}}"><i class="fa-solid fa-moon fa-beat-fade"></i> Night
            Mate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ms-5">
                @if(Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{route('home.dashboard')}}">Хранилище снов</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user fa-sm"></i>
                            {{Auth::getUser()['name']}}</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><a class="dropdown-item" href="portfolio-item.html">Редактировать профиль</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="{{route('auth.logout')}}" method="post">
                                @csrf
                                <li><a class="dropdown-item text-danger" onclick="event.preventDefault(); this.closest('form').submit();" href="{{route('auth.logout')}}">Выйти</a></li>
                            </form>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


@yield('content')

<!-- Footer-->
<footer class="bg-secondary py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Night Mate Inc. 2024</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>
</html>
