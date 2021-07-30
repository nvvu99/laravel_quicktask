@extends('base')

@section('title', __('labels.register'))

@section('addtional_stylesheet')
    <link rel="stylesheet" href="{{ mix('/css/personal_profile_edit.css') }}">
@endsection

@section('content')
    <main class="container">
        <form
            class="edit-profile-form card"
            action="{{ route('profiles.update', ['profile' => $profile]) }}"
            method="post"
        >
            @method('put')
            <h3 class="form-header">
                {{ __('labels.update_profile') }}
            </h3>
            @csrf

            <fieldset id="full-name">
                <div class="field">
                    <label for="first-name">
                        {{ __('labels.first_name') }}
                    </label>
                    <input
                        type="text"
                        name="first_name"
                        id="first-name"
                        value="{{ $profile->first_name }}"
                    >
                    @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="last-name">
                        {{ __('labels.last_name') }}
                    </label>
                    <input
                        type="text"
                        name="last_name"
                        id="last-name"
                            value="{{ $profile->last_name }}"
                    >
                    @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <div class="field">
                <label for="phone-number">
                    {{ __('labels.phone_number') }}
                </label>
                <input
                    type="text"
                    name="phone_number"
                    id="phone-number"
                    value="{{ $profile->phone_number }}"
                >
                @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="address">
                    {{ __('labels.address') }}
                </label>
                <input
                    type="text"
                    name="address"
                    id="address"
                    value="{{ $profile->address }}"
                >
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="birthday">
                    {{ __('labels.birthday') }}
                </label>
                <input
                    type="date"
                    name="birthday"
                    id="birthday"
                    value="{{ $profile->birthday }}"
                >
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="about-me">
                    {{ __('labels.about_me') }}
                </label>
                <textarea name="about" id="about_me" rows="10">{{ $profile->about }}</textarea>
                @error('about')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button>{{ __('labels.update_profile') }}</button>
        </form>
    </main>
@endsection

