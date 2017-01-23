<header class="navbar-fixed">
    <nav class="nav  has-shadow">
        <div class="nav-left">
            <span class="nav-item">
                <a class="button is-outlined" href="{{ url('/') }}">
                    <span class="icon"><i class="fa fa-home"></i></span>
                    <span>{{ config('app.name', 'OpenApp') }}</span>
                </a>
            </span>
        </div>

        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span id="nav-toggle" class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>
        <!-- This "nav-menu" is hidden on mobile -->
        <!-- Add the modifier "is-active" to display it on mobile -->
        <div id="nav-menu" class="nav-right nav-menu">
            <span class="nav-item">
                <a class="button is-outlined" href="{{ url('/cities') }}">
                    <span class="icon"><i class="fa fa-building-o"></i></span>
                    <span>My Cities</span>
                </a>
            </span>
            {{--<span class="nav-item">--}}
                {{--<a class="button is-outlined" href="{{ url('/login') }}">--}}
                    {{--<span class="icon"><i class="fa fa-sign-in"></i></span>--}}
                    {{--<span>Login</span>--}}
                {{--</a>--}}
            {{--</span>--}}
            {{--<span class="nav-item">--}}
                {{--<a class="button is-outlined" href="{{ url('/register') }}">--}}
                    {{--<span class="icon"><i class="fa fa-user"></i></span>--}}
                    {{--<span>Register</span>--}}
                {{--</a>--}}
            {{--</span>--}}
        </div>
    </nav>
</header>
