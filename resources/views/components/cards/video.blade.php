@props(['video'])

@php
    $thubmnailUrl = 'https://i.ytimg.com/vi/' . $video['id'] . '/hqdefault.jpg';
    $cardClasses = "flex flex-col shrink-0 gap-2 bg-white/20 p-3 sm:w-96 w-full max-w-sm sm:h-75 h-86  rounded-md";
//    if ($video['is_featured']) {
//        $cardClasses .= " border-1 border-green-300"; // highlight
//    }
@endphp


<div class="{{$cardClasses}}">
    <a href="{{"/videos/" . $video->id}}" class="group">
        <h4 class="text-xl group-hover:text-blue-300 transition-colors duration-500">{{$video->title}}</h4>
        <img class="w-full h-47 object-cover mt-2 rounded-xl" src="{{$thubmnailUrl}}" alt="video thumbnail">
    </a>
    <div class="flex gap-2 grow flex-start flex-wrap items-center">
        @foreach($video->categories as $category)
        <x-tag href="{{'/categories/' . $category->id}}" size="small">{{$category->name}}</x-tag>
        @endforeach
    </div>
</div>
