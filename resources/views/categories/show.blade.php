<x-layout>
    <x-page-heading># {{$category->name}}</x-page-heading>
    <article class=" mt-5 mb-5 flex flex-wrap gap-5 justify-center mx-auto">
        @foreach($videos as $video)
            <x-cards.video :video="$video"/>
        @endforeach
    </article>
</x-layout>

