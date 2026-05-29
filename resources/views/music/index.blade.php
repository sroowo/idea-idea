<x-layout>
    <p class="mt-6">Music Page</p>
    <p class="mt-6">Songs - Albums</p>
    @foreach ($songs as $song)
        <div class="mt-6 grid grid-cols-4 gap-4">
            <p>{{ $song->name }}</p>
            <p>{{ $song->album->name }}</p>
            <form method="POST" action="/music/{{ $song->id }}/like">
                @csrf
                <button type="submit" class="btn">
                    Like
                </button>
            </form>
        </div>
    @endforeach
</x-layout>