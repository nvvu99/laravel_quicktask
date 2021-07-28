<form
    action="{{ route('profiles.skills.store', ['profile' => $profile]) }}"
    method="post"
    class="create-skill-form"
>
    @csrf

    <input
        type="text"
        name="name"
        id="skill-name"
        value="{{ old('name') }}"
    >

    <button type="submit">{{ __('labels.add') }}</button>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</form>
