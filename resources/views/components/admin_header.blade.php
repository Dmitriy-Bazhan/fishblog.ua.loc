<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-lightgray shadow-sm" >

        <h3>Администрация сайта</h3>

        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">На главную страницу сайта</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<br>

<div class="row bg-title">

    @if(isset($model))
        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12" style="display: inline-block">

            @if($model == 'User')
                <a><h4 class="page-title" style="color: lightgreen;">Пользователи</h4></a>
            @else
                <a href="{{ url('admin') }}" style="color: black;"><h4 class="page-title" style="">Пользователи</h4></a>
            @endif
        </div>

        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12" style="display: inline-block">

            @if($model == 'Fish')
                <a><h4 class="page-title" style="color: lightgreen;">Рыбы</h4></a>
            @else
                <a href="{{ url('admin/fish-table') }}" style="color: black;"><h4 class="page-title" style="">Рыбы</h4></a>
            @endif
        </div>

        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12" style="display: inline-block">
            @if($model == 'Lake')
                <a><h4 class="page-title" style="color: lightgreen;">Водоемы</h4></a>
            @else
                <a href="{{ url('admin/lake-table') }}" style="color: black;"><h4 class="page-title" style="">Водоемы</h4></a>
            @endif
        </div>

        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12" style="display: inline-block">
            @if($model == 'Location')
                <a><h4 class="page-title" style="color: lightgreen;">Локации</h4></a>
            @else
                <a href="{{ url('admin/location-table') }}" style="color: black;"><h4 class="page-title" style="">Локации</h4></a>
            @endif
        </div>

        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12" style="display: inline-block">
            @if($model == 'Category')
                <a><h4 class="page-title" style="color: lightgreen;">Категории рыб</h4></a>
            @else
                <a href="{{ url('admin/category-table') }}" style="color: black;"><h4 class="page-title" style="">Категории рыб</h4></a>
            @endif
        </div>


    @endif

</div>
