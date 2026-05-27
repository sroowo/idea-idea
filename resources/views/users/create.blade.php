<x-layout>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-5 mx-auto">
            <legend class="fieldset-legend">Create User</legend>

            <label class="label" for="name">Name</label>
            <input class="input" name="name" placeholder="Name" required />

            <label class="label" for="email">Email</label>
            <input class="input" name="email" type="email" placeholder="Email" required />

            <label class="label" for="password">Password</label>
            <input class="input" name="password" type="password" placeholder="Password" required />

            <label class="label" for="password_confirmation">Confirm Password</label>
            <input class="input" name="password_confirmation" type="password" placeholder="Password" required />
            <x-error name="password"></x-error>

            <button class="btn btn-neutral mt-4">Create User</button>
        </fieldset>
    </form>
</x-layout>