<x-layout>
    <x-header/>

    <div class="flex min-h-full flex-col justify-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                @csrf
                <x-forms.input label="Email" name="email" required type="email"/>
                <x-forms.input label="Password" name="password" required type="password"/>
                <x-forms.button>Login</x-forms.button>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register
                    Account Here</a>
            </p>
        </div>
    </div>
</x-layout>
