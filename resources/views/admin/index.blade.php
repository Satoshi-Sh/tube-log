<x-layout>
    <x-page-heading>Dashboard</x-page-heading>

    @if(session('success'))
        <div class="text-xl text-emerald-300 underline underline-offset-1 decoration-emerald-300 text-center">
            {{ session('success') }}
        </div>
    @endif

    <section class="flex flex-col">
        <x-section-heading>Edit Categories</x-section-heading>
        <div class="mt-10 flex flex-row flex-wrap justify-center sm:justify-start gap-5">
            @foreach($categories as $category)
                <x-tag href="{{'/dashboard/categories/edit/' . $category->id}}">{{ $category->name }} {{ $category->videos_count }}</x-tag>
            @endforeach
        </div>
        <a href="/dashboard/categories" class="self-center inline-block mt-20 hover:text-blue-400 cursor-pointer transition-all duration-300 ">Create New Category</a>
    </section>

    <section>
        <x-section-heading>Featured Videos</x-section-heading>
        <div class=" mt-10 flex flex-wrap gap-4 justify-center">
            @foreach($featuredVideos as $video)
                <x-cards.video-edit :video="$video"/>
            @endforeach
        </div>
    </section>

    <section>
        <x-section-heading>Uploaded Videos</x-section-heading>
        <div class=" mt-10 flex flex-wrap gap-4 justify-center">
            @foreach($uploadedVideos as $video)
                <x-cards.video-edit :video="$video"/>
            @endforeach
        </div>
    </section>

    <section>
        <x-section-heading>Upload New Videos</x-section-heading>
        <div class=" mt-10 flex flex-wrap gap-4 justify-center">
            @foreach($newVideos as $video)
                <x-cards.video-upload :video="$video"/>
            @endforeach
        </div>
    </section>

</x-layout>
