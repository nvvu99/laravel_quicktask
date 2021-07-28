<form
    action="{{ route('skills.destroy', ['skill' => $skill]) }}"
    method="post"
    class="delete-skill-form"
>
    @method('delete')
    @csrf

    <button type="submit">
        <i class="fas fa-trash"></i>
    </button>
</form>

