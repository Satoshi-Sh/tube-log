<x-layout>
    <section>
        <x-section-heading>Picked Videos</x-section-heading>
        <article class="scrollbar-hide mt-5 flex gap-4 overflow-x-auto whitespace-nowrap ">
            @foreach($featuredVideos as $video)
            <x-cards.video :video="$video"/>
            @endforeach
        </article>

    </section>
    <section>
        <x-section-heading>Categories</x-section-heading>
        <div class="mt-10 flex flex-row flex-wrap justify-center sm:justify-start gap-5">
            @foreach($categories as $category)
                <x-tag>{{$category['name']}} {{$category['videos_count']}}</x-tag>
            @endforeach

        </div>
    </section>

    <section>
        <x-section-heading>Uploaded Videos</x-section-heading>
        <article class=" mt-5 mb-5 flex flex-wrap gap-5 justify-center mx-auto">
            @foreach($videos as $video)
                <x-cards.video :video="$video"/>
            @endforeach
        </article>


    </section>

</x-layout>
