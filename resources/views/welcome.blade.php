<x-layout title="Home">
    {{$greeting}}, {{$person}}!
    <!-- @if (count($tasks))
        <p>Yes we have tasks. how many? <?= count($tasks) ?> tasks. </p>
    @endif
    @foreach($tasks as $task)
        <li> {{ $task }}</li>
    @endforeach -->
    <a href="/ideas">Idea</a>
</x-layout>