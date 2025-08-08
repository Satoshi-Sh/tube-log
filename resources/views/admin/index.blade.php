<x-layout>
    <x-page-heading>Dashboard</x-page-heading>

    <section class="flex flex-col">
        <x-section-heading>Edit Categories</x-section-heading>
        <div class="mt-10 flex flex-row flex-wrap justify-center sm:justify-start gap-5">
            <x-tag>Bass 10</x-tag>
            <x-tag>Programming 7</x-tag>
        </div>
        <a href="/dashboard/categories" class="self-center inline-block mt-20 hover:text-blue-400 cursor-pointer transition-all duration-300 ">Create New Category</a>
    </section>

    <x-section-heading>Upload Videos</x-section-heading>
    <section class="flex flex-wrap gap-4 justify-center">
    @foreach($videos as $video)
        <x-video-card-edit :video="$video"/>
    @endforeach
    </section>

</x-layout>
