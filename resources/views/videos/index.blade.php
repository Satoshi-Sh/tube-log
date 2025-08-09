<x-layout>
    <section>
        <x-section-heading>Picked Videos</x-section-heading>
        <article class="scrollbar-hide mt-5 flex gap-4 overflow-x-auto whitespace-nowrap ">
            <x-cards.video/>
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
            <x-cards.video/>
        </article>


    </section>

</x-layout>
