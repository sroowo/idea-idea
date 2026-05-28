<x-layout>
    <h1 class="mt-3">Users List</h1>

    <a href="{{ route('users.create') }}" class="mt-2 btn">Create New User</a>
    @forelse ($users as $user)
        <div class="p-2">
            <a href="/users/{{ $user->id }}" class='text-primary font-bold'>
                <div>
                    <p>{{ $user->name }}</p>
                </div>
            </a>
            <span>{{ $user->email }}</span>
            <a href="/users/{{ $user->id }}/edit" class="btn btn-sm">Edit</a>
        </div>
    @empty
        <p>No Users</p>
    @endforelse
</x-layout>