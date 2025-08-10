<x-layout>
    <x-page-heading># {{$category->name}}</x-page-heading>
    <article class="scrollbar-hide mt-5 flex gap-4 overflow-x-auto whitespace-nowrap ">
        @foreach($videos as $video)
            <x-cards.video :video="$video"/>
        @endforeach
    </article>
</x-layout>

