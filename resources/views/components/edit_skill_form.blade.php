<form
    action="{{ route('skills.update', ['skill' => $skill]) }}"
    method="post"
    class="edit-skill-form"
>
    @method('put')
    @csrf

    <input
        type="text"
        name="name"
        id="skill-name"
        value="{{ $skill->name }}"
    >

    <button type="submit">{{ __('labels.update') }}</button>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</form>
