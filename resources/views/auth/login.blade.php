<x-layout title="Login">
    <form action="/login" method="POST">
        @csrf

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-5 mx-auto">
            <legend class="fieldset-legend">Login</legend>

            <label class="label" for="email">Email</label>
            <input class="input" name="email" type="email" placeholder="Email" required />
            @error('email')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
            @enderror

            <label class="label" for="password">Password</label>
            <input class="input" name="password" type="password" placeholder="Password" required />

            <button class="btn btn-neutral mt-4">Login</button>
        </fieldset>
    </form>
</x-layout>