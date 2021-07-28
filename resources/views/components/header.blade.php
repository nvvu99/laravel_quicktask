<header class="card">
    <a href="#">
        <section class="logo">
            {{ __('labels.branch') }}
        </section>
    </a>
    <section class="user-action">
        @guest
            <a id="login-link" href="{{ route('login') }}">{{ __('labels.login') }}</a>
        @endguest
    </section>
</header>
