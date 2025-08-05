@props(['active'=>false])

<a {{$attributes}} class="{{$active? 'underline underline-white underline-offset-5' :'hover:text-gray-300 transition-colors duration-300'}}">{{$slot}}</a>
