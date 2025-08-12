<x-layout>
    <x-page-heading>Update a Cateogory</x-page-heading>
    <x-forms.form method="PUT" action="{{'/dashboard/categories/edit/' . $category->id  }}">
        <x-forms.input label="Name" name="name" value="{{$category->name}}"/>
        <x-forms.button>Submit</x-forms.button>
    </x-forms.form>
    <x-forms.divider/>
    <x-forms.form method="DELETE" action="{{'/dashboard/categories/' . $category['id']}}" >
        <x-forms.button class="bg-red-400 hover:bg-red-500">Delete</x-forms.button>
    </x-forms.form>
</x-layout>
