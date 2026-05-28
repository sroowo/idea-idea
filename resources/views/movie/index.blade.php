<x-layout>
    <p>Movie</p>
    @foreach($movies as $movie)
        <div class="mt-4">
            {{ $movie->title }}
        </div>
        <form method="POST" action="/movie/{{ $movie->id }}/like">
            @csrf
            <button type="submit" class="btn">Like</button>
        </form>
    @endforeach
</x-layout>