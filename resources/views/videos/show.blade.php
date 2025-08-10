<x-layout>
    <div class="relative z-1 mt-20" style="padding-top: 56.25%">
        <iframe src="https://www.youtube.com/embed/{{ $video->id }}" class="absolute inset-0 w-full h-full" allowfullscreen></iframe>
    </div>
    <div class="p-5">
        <p>{{$video->description}}</p>

        <p class="mt-10 text-sm  italic text-gray-100">
            Published at {{ $video->published_at }}
        </p>
        <div class="mt-3 flex gap-2 grow flex-start items-center">
            @foreach($video->categories as $category)
                <x-tag size="small" href="{{'/categories/' . $category->id}}">{{$category->name}}</x-tag>
            @endforeach
        </div>
    </div>

</x-layout>
