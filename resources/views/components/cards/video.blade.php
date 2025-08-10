@props(['video'])

@php
    $thubmnailUrl = 'https://i.ytimg.com/vi/' . $video['id'] . '/hqdefault.jpg'
@endphp


<div class=" flex flex-col shrink-0 gap-2 bg-white/20 p-3 sm:w-96 w-60 h-75 rounded-md">
    <a href="{{"/videos/" . $video->id}}" class="group">
        <h4 class="text-xl group-hover:text-blue-300 transition-colors duration-500">{{$video->title}}</h4>
        <img class="w-full h-47 object-cover mt-2 rounded-xl" src="{{$thubmnailUrl}}" alt="video thumnail">
    </a>
    <div class="flex gap-2 grow flex-start items-center">
        @foreach($video->categories as $category)
        <x-tag href="{{'/categories/' . $category->id}}" size="small">{{$category->name}}</x-tag>
        @endforeach
    </div>
</div>
