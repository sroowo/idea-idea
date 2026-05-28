<x-layout>
    <p class="mt-6">Music Page</p>
    @foreach ($music as $ms)
        <div class="mt-6 grid grid-cols-4 gap-4">
            <p>{{ $ms->song }}</p>
            <p>{{ $ms->album }}</p>

            <form method="POST" action="/music/{{ $ms->id }}/like">
                @csrf
                <button type="submit" class="btn">Like</button>
            </form>
        </div>
    @endforeach
</x-layout>