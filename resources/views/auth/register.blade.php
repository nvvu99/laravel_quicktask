@extends('base')

@section('title', __('labels.register'))

@section('addtional_stylesheet')
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
@endsection

@section('content')
    <main class="container">
        <form class="register-form card" action="{{ route('register') }}" method="post">
            <h1 class="form-header">{{ __('labels.register') }}</h1>

            @csrf

            <div class="field">
                <label for="username">
                    {{ __('labels.username') }}
                    <span style="color: red;">*</span>
                </label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    value="{{ old('username') }}"
                >
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="email">
                    {{ __('labels.email') }}
                    <span style="color: red;">*</span>
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <fieldset id="full-name">
                <div class="field">
                    <label for="first-name">
                        {{ __('labels.first_name') }}
                        <span style="color: red;">*</span>
                    </label>
                    <input
                        type="text"
                        name="first_name"
                        id="first-name"
                        value="{{ old('first_name') }}"
                    >
                    @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="last-name">
                        {{ __('labels.last_name') }}
                        <span style="color: red;">*</span>
                    </label>
                    <input
                        type="text"
                        name="last_name"
                        id="last-name"
                        value="{{ old('last_name') }}"
                    >
                    @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <div class="field">
                <label for="password">
                    {{ __('labels.password') }}
                    <span style="color: red;">*</span>
                </label>
                <input type="password" name="password" id="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password-confirmation">
                    {{ __('labels.password_confirmation') }}
                    <span style="color: red;">*</span>
                </label>
                <input type="password" name="password_confirmation" id="password-confirmation">
            </div>

            <button>{{ __('labels.register') }}</button>
        </form>
    </main>
@endsection

