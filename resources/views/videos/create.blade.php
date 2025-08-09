<x-layout>
    <x-page-heading>Upload Video</x-page-heading>
        <div class="flex justify-center">
            <img src="{{$video['thumbnails']['high']['url']}}" alt="video thumbnail"/>
        </div>
    <x-forms.form method="POST" action="{{'/dashboard/create/' . $id}}" >
        <x-forms.input label="Title" name="title" value="{{$video['title']}}"/>
        <x-forms.checkbox-group
            label="Categories"
            name="categories"
            :options="$categories"
        />

        <x-forms.checkbox label="Featured" name="is_featured"></x-forms.checkbox>
        <x-forms.textarea label="description" name="description" value="{{$video['description']}}"></x-forms.textarea>
        <x-forms.datetime label="Published At" name="published_at" value="{{ old('published_at', \Carbon\Carbon::parse($video['publishedAt'])->format('Y-m-d\TH:i')) }}" />

        <x-forms.button>Upload</x-forms.button>
    </x-forms.form>

</x-layout>
