<header class="card">
    <a href="#">
        <section class="logo">
            {{ __('labels.branch') }}
        </section>
    </a>
    <section class="user-action">
        <a class="locale" href="{{ route('change_locale', ['locale' => 'vi']) }}">
            <img src="{{ mix('images/vietnam_circle_flag_icon.svg') }}" alt="vi" >
        </a>
        <a class="locale" href="{{ route('change_locale', ['locale' => 'en']) }}">
            <img src="{{ mix('images/uk_flag_icon.svg') }}" alt="en" >
        </a>
        @guest
            <a id="register-link" href="{{ route('register') }}">{{ __('labels.register') }}</a>
            <a id="login-link" href="{{ route('login') }}">{{ __('labels.login') }}</a>
        @endguest

        @auth
            <a id="logout-link" href="{{ route('logout') }}">{{ __('labels.logout') }}</a>
        @endauth
    </section>
</header>
