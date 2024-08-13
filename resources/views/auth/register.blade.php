<x-layout>
    <x-header/>

    <div class="flex min-h-full flex-col justify-center">

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-4" action="/login" method="POST">
                @csrf
                <x-forms.input label="Full name" name="name" required type="name"/>
                <x-forms.input label="Email" name="email" required type="email"/>
                <x-forms.input label="Password" name="password" required type="password"/>
                <x-forms.input label="Password Confirmation" name="password_confirmation" required type="password"/>
                <x-forms.button>Login</x-forms.button>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Have an account?
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign-in here</a>
            </p>
        </div>
    </div>
</x-layout>
