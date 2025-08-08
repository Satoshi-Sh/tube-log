<x-layout>
    <x-page-heading>Create a New Cateogory</x-page-heading>
    <x-forms.form method="POST" action="/dashboard/categories">
        <x-forms.input label="Name" name="name"/>
        <x-forms.button>Submit</x-forms.button>
    </x-forms.form>
</x-layout>
