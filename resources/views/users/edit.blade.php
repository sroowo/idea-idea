<x-layout>
    <h1>Edit User</h1>

    <form method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('PATCH')

        <label class="label">Name</label>
        <input
            class="input"
            type="text"
            name="name"
            value="{{ $user->name }}"
            required
        >

        <label class="label">Email</label>
        <input
            class="input"
            type="email"
            name="email"
            value="{{ $user->email }}"
            required
        >

        <div class="mt-4 flex gap-2">
            <button type="submit" class="btn btn-neutral">
                Update User
            </button>

            <button
                type="submit"
                form="delete_user_form"
                class="btn btn-error"
            >
                Delete User
            </button>
        </div>
    </form>

    <form id="delete_user_form" method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>