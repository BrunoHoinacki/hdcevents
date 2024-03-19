<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Logar') }}
                </x-button>
            </div>
            <div class="my-6">
                <div class="relative flex items-center justify-center">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative bg-white px-4 text-lg text-gray-500">
                        OU
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-4 my-6">
                <a href="/auth/facebook/redirect"
                    class="inline-flex items-center px-4 py-2 text-center text-white bg-blue-500 rounded hover:bg-blue-700">
                    <i class="fab fa-facebook fa-lg mr-2"></i> 
                    Facebook
                </a>
                <a href="/auth/github/redirect"
                    class="inline-flex items-center px-4 py-2 text-center text-white bg-black rounded hover:bg-gray-700">
                    <i class="fab fa-github fa-lg mr-2"></i> 
                    Github
                </a>
                <a href="/auth/google/redirect"
                    class="inline-flex items-center px-4 py-2 text-center text-white bg-red-500 rounded hover:bg-blue-700">
                    <i class="fab fa-google fa-lg mr-2"></i> 
                    Google
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
