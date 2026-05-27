<x-layout>
    @if ($ideas->count())
    <div class = "mt-6 text-white">
        <p>your ideas</p>

        <ul class="mt-6 grid grid-cols-2 gap-x-6 gap-y-4">
            @foreach($ideas as $idea)
                <a href="/ideas/{{ $idea->id }}" class="card bg-primary text-primary-content w-96">
                    <div class="card-body">
                        <h2 class="card-title">{{ $idea->description }}</h2>
                    </div>
                </a>
                <!-- <a href="/ideas/{{$idea->id}}" class='text-sm'>{{$idea->description}}</a> -->
            @endforeach
        </ul>
    </div>
    @else
        <p> No ideas yet. <a href="/ideas/create">Create a new one.</a></p>
    @endif
</x-layout>