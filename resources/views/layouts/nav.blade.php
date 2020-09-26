<!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> -->
<!-- <nav class="navbar navbar-expand-md navbar-dark bg-custom" style="background:rgba(0, 0, 0, 0.0001);"> -->
    <nav class="navbar navbar-expand-md navbar-dark bg-custom" style="">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('', 'Resource Sharing') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Барај 
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 
                                <a class="dropdown-item" href="/threads">Сите постови</a>
                                    @if (auth()->check())
                                        <a class="dropdown-item" href="/threads?by={{ auth()->user()->name }}">Мои постови</a>
                                    @endif
                                <a class="dropdown-item" href="/threads?popular=1">Популарно</a>
                                <a class="dropdown-item" href="/threads?unanswered=1">Одговорени постови</a>
                            </div>
                        </li>

                        <li lass="nav-item">
                            <a class="nav-link" href="/threads/create">Нов пост</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Канали
                            </a>
                            <div class="dropdown-menu">
                                <ul class="list-group" style="list-style-type:none">
                                    @foreach ($channels as $channel)
                                        <li><a href="/threads/{{ $channel->slug }}" class="dropdown-item">{{ $channel->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Најава') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрирај се') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- <li class="nav-item dropdown">
                                
                            </li> -->
                            <user-notifications></user-notifications>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Одјави се') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">
                                    Мој профил <span class="caret"></span>
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