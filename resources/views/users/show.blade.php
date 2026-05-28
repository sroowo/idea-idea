<x-layout>
    <div class='mt-6 text-white'>
        <h2 class='font-bold'>User Info</h2>
        <div>
            {{ $user->name}}
        </div>
    </div>
    <h1 class="mt-5 text-white">Liked - album - song</h1>
    @foreach ($user->songs as $song)
        <p class="mt-1">{{ $song->song }} - {{ $song->album }}</p>
    @endforeach
    <h1 class="mt-5 text-white">Liked Movies</h1>
    @foreach ($user->movies as $movie)
        <p class="mt-1">{{ $movie->title }}</p>
    @endforeach
</x-layout>
