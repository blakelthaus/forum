<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/forum') }}">
            {{ config('app.name', 'Home') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav mr-auto">
                <li class="dropdown" style="margin:10px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu" style="margin:10px">
                        <li style="margin:10px">
                            <a href="/forum/threads">All Threads</a>
                        </li>
                        @if (auth()->check())
                            <li style="margin:10px">
                                <a href="/forum/threads?by={{ auth()->user()->name }}"> My Threads</a>
                            </li>
                        @endif
                        <li style="margin:10px">
                            <a href="/forum/threads?popular=1">Popular Threads</a>
                        </li>
                    </ul>
                </li>


                <li style="margin:10px">
                    <a href="/forum/threads/create">New Thread</a>
                </li>
                <li class="dropdown" style="margin:10px">
                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown">Channels <b
                            class="caret" aria-haspopup="true" aria-expanded="false"></b></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($channels as $channel)
                            <li><a href="/forum/threads/{{ $channel->slug }}/">{{ $channel->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
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
                            <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">My Profile</a>
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
