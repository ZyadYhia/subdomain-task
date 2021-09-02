<nav id="nav">
    <form style="display: none;" id="logout-form" action="{{ url('logout') }}" method="post">@csrf</form>

    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ url('') }}">{{ __('web.home') }}</a></li>
        @guest
            <li><a href="{{ url('login') }}">{{ __('web.signin') }}</a></li>
            <li><a href="{{ url('register') }}">{{ __('web.signup') }}</a></li>
        @endguest
        @auth
            @if (Auth::user()->role->name == 'provider')
                <li><a href="{{ url('profile/create-location') }}">{{ __('web.profile') }}</a></li>
            @endif
            @if (Auth::user()->role->name == 'admin' or Auth::user()->role->name == 'superadmin')
                <li><a href="{{ url('dashboard') }}">{{ __('web.dashboard') }}</a></li>
            @endif
            <li><a id="logout-link" href="{{ url('logout') }}">{{ __('web.signout') }}</a></li>
        @endauth

    </ul>
</nav>
