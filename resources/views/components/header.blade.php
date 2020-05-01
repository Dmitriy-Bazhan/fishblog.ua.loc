<div class="head fixed-top">
    <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm">
        <div class="container">


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle navbar-brand" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('site.aside.nav_panel_name')
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #6C757D">
                    <a class="dropdown-item navbar-brand"
                       href="{{ url_with_locale('/fishes') }}">@lang('site.aside.fishes')</a>
                    <a class="dropdown-item navbar-brand"
                       href="{{ url_with_locale('/lakes') }}">@lang('site.aside.lakes')</a>
                    <a class="dropdown-item navbar-brand" href="#">@lang('site.aside.locations')</a>
                    <a class="dropdown-item navbar-brand" href="#">@lang('site.aside.blog')</a>
                    <a class="dropdown-item navbar-brand" href="#">@lang('site.aside.interesting')</a>
                    <a class="dropdown-item navbar-brand" href="#">@lang('site.aside.useful_links')</a>
                    <a class="dropdown-item navbar-brand" href="#">@lang('site.aside.categories')</a>
                    @if(auth()->user())
                        <a class="dropdown-item navbar-brand" href="#">@lang('site.aside.my_profile')</a>
                    @endif
                </div>
            </div>

            <a class="navbar-brand" href="{{ url_with_locale('/') }}">@lang('site.header.name')</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span>@lang('site.header.' . $title)</span>
                    </li>
                </ul>



                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('site.header.login')</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">@lang('site.header.register')</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <button id="navbarDropdown" class="btn btn-secondary dropdown-toggle navbar-brand"
                                    role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="navbar-brand">@lang('site.header.you_enter')</span>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                 style="background-color: #6C757D">
                                <a class="dropdown-item navbar-brand" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    @lang('site.header.logout')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>



        </div>
        @if(auth()->user())
            <a class="navbar-brand" href="/admin">Admin</a>
        @endif

        <div class="container col-sm-1">
            @if(app()->getLocale() == 'ua')
                <button class="btn btn-secondary active">UA</button>
            @else
                <a href="{{ url( $path) }}">
                    <button class="btn btn-secondary">UA</button>
                </a>
            @endif
            @if(app()->getLocale() == 'ru')
                <button class="btn btn-secondary active">RU</button>
            @else
                <a href="{{ url( 'ru' . $path) }}">
                    <button class="btn btn-secondary">RU</button>
                </a>
            @endif
            @if(app()->getLocale() == 'en')
                <button class="btn btn-secondary active">EN</button>
            @else
                <a href="{{ url( 'en' . $path) }}">
                    <button class="btn btn-secondary">EN</button>
                </a>
            @endif
        </div>


    </nav>
</div>




