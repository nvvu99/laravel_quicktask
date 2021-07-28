<header class="card">
    <a href="#">
        <section class="logo">
            {{ __('labels.branch') }}
        </section>
    </a>
    <section class="user-action">
        @guest
            <a id="register-link" href="{{ route('register') }}">{{ __('labels.register') }}</a>
            <a id="login-link" href="{{ route('login') }}">{{ __('labels.login') }}</a>
        @endguest

        @auth
            <a id="logout-link" href="{{ route('logout') }}">{{ __('labels.logout') }}</a>
        @endauth
    </section>
</header>
