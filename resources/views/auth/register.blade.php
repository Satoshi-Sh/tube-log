<x-layout>
    <p class="text-2xl text-red-500">Sorry, we are not open at the moment...</p>
    <x-page-heading>Register</x-page-heading>
    <x-forms.form method="GET" action="/register" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name"/>
        <x-forms.input label="Email" name="email" type="email"/>
        <x-forms.input label="Password" name="password" type="password"/>
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password"/>

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>
