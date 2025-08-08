@props(["video"])

<a href="/dashboard/create/{{$video['snippet']['resourceId']['videoId']}}" class="group flex flex-col shrink-0 gap-2 bg-white/20 p-3 sm:w-96 w-60 h-75 rounded-md hover:border hover:border-blue-800 ">
    <div>
        <h4 class="text-xl truncate">{{$video['snippet']['title']}}</h4>
        <img class="w-full h-47 object-cover mt-2 rounded-xl" src="{{$video['snippet']['thumbnails']['high']['url']}}" alt="video thumnail">
    </div>
    <div class="my-auto text-center font-extrabold text-xl group-hover:text-blue-300 group-hover:text-2xl transition-all duration-300 " >Edit</div>
</a>
