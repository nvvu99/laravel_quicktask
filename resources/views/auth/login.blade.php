@extends('base')

@section('title', __('labels.login'))

@section('addtional_stylesheet')
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
@endsection

@section('content')
    <main class="container">
        <form class="login-form card" action="{{ route('login') }}" method="post">
            <h1 class="form-header">{{ __('labels.login') }}</h1>

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
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">{{ __('labels.remember_me') }}</label>
            </div>

            <button>{{ __('labels.login') }}</button>
        </form>
    </main>
@endsection
