@extends('base')

@section('title', __('labels.profile'))

@section('addtional_stylesheet')
    <link rel="stylesheet" href="{{ mix('/css/personal_profile.css') }}">
@endsection

@section('content')
    <main class="container">
        <section class="bio card">
            <div class="profile-action">
                <a
                    class="edit-profile-icon"
                    href="{{ route('profiles.edit', ['profile' => $profile]) }}"
                >
                    <i class="fas fa-2x fa-pencil-alt"></i>
                </a>
                <form
                    action="{{ route('profiles.destroy', ['profile' => $profile]) }}"
                    method="post"
                    class="delete-user-form"
                >
                    @method('delete')
                    @csrf
                    <button type="submit">
                        <i class="fas fa-2x fa-trash-alt"></i>
                    </button>
                </form>
            </div>

            <div class="user-image">
                <div class="cover-image">
                    <img src="{{ $profile->cover_image_url }}" alt="" srcset="">
                </div>
                <div class="avatar">
                    <img src="{{ $profile->avatar_url }}" onerror="this.src='https://ui-avatars.com/api/?name={{ $profile->first_name }}&size=150'">
                </div>
            </div>

            <div class="user-full-name">
                {{ $profile->user->first_name }} {{ $profile->user->last_name }}
            </div>

            <div class="about-me">
                <h3>{{ __('labels.about_me') }}</h3>

                @if ($profile->about)
                    <p>{{ $profile->about }}</p>
                @endif

                @if ($profile->birthday)
                    <div id="birthday">
                        <i class="fas fa-birthday-cake"></i>
                        {{ $profile->birthday }}
                    </div>
                @endif
            </div>

            <div class="contact-info">
                <h3>{{ __('labels.contact_info') }}</h3>

                @if ($profile->phone_number)
                    <div id="phone-number" class="contact-info-item">
                        <i class="fas fa-phone-alt"></i>
                        {{ $profile->phone_number }}
                    </div>
                @endif

                @if ($profile->email)
                    <div id="email" class="contact-info-item">
                        <i class="far fa-envelope"></i>
                        {{ $profile->email }}
                    </div>
                @endif

                @if ($profile->address)
                    <div id="address" class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $profile->address }}
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
