@php
    $thubmnailUrl = 'https://i.ytimg.com/vi/' . $video['id'] . '/hqdefault.jpg'
@endphp

<x-layout>
    <x-page-heading>Update Video</x-page-heading>
        <div class="flex justify-center">
            <img src="{{$thubmnailUrl}}" alt="video thumbnail"/>
        </div>
    <x-forms.form method="PUT" action="{{'/dashboard/edit/' . $video['id']}}" >
        <x-forms.input label="Title" name="title" value="{{$video['title']}}"/>
        <x-forms.checkbox-group
            label="Categories"
            name="categories"
            :options="$categories"
            :selected="$selected"
        />

        <x-forms.checkbox label="Featured" name="is_featured" :isChecked="$video['is_featured']"></x-forms.checkbox>
        <x-forms.textarea label="description" name="description" value="{{$video['description']}}"></x-forms.textarea>
        <x-forms.datetime label="Published At" name="published_at" value="{{ old('published_at', \Carbon\Carbon::parse($video['publishedAt'])->format('Y-m-d\TH:i')) }}" />

        <x-forms.button>Update</x-forms.button>
    </x-forms.form>
    <x-forms.divider/>
    <x-forms.form method="DELETE" action="{{'/dashboard/videos/' . $video['id']}}" >
        <x-forms.button class="bg-red-400 hover:bg-red-500">Delete</x-forms.button>
    </x-forms.form>
</x-layout>
