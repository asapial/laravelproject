<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 text-center text-green-500 font-medium" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-gradient-to-br from-gray-50 to-gray-200 dark:from-gray-800 dark:to-gray-900 shadow-xl rounded-2xl p-10 max-w-md mx-auto">
        @csrf

        <!-- Email Address -->
        <div class="mb-6">
            <x-input-label for="email" :value="__('Email')" class="text-gray-800 dark:text-gray-200 text-lg font-semibold" />
            <x-text-input id="email" class="block mt-3 w-full rounded-xl border-gray-300 dark:border-gray-600 focus:ring-indigo-600 focus:border-indigo-600 dark:bg-gray-700 dark:text-gray-100 px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('Password')" class="text-gray-800 dark:text-gray-200 text-lg font-semibold" />
            <x-text-input id="password" class="block mt-3 w-full rounded-xl border-gray-300 dark:border-gray-600 focus:ring-indigo-600 focus:border-indigo-600 dark:bg-gray-700 dark:text-gray-100 px-4 py-3" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-6">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm" name="remember">
            <label for="remember_me" class="ml-2 text-gray-600 dark:text-gray-400 text-sm">{{ __('Remember me') }}</label>
        </div>

        <div class="flex flex-col items-center gap-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="w-full py-3 px-6 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-2 text-white font-bold text-lg rounded-xl">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="mt-8 text-center">
            <span class="text-gray-600 dark:text-gray-400">Don't have an account?</span>
            <a href="{{ route('register') }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">Sign Up</a>
        </div>
    </form>
</x-guest-layout>
