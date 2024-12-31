<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-white dark:bg-gray-900 shadow-lg rounded-lg p-8 max-w-lg mx-auto">
        @csrf

        <!-- Name -->
        <div class="mb-6">
            <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300 text-lg font-semibold" />
            <x-text-input id="name" class="block mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-200 px-4 py-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Email Address -->
        <div class="mb-6">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300 text-lg font-semibold" />
            <x-text-input id="email" class="block mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-200 px-4 py-3" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300 text-lg font-semibold" />
            <x-text-input id="password" class="block mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-200 px-4 py-3" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300 text-lg font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-200 px-4 py-3" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center justify-between mt-8">
            <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="py-3 px-6 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-2 text-white font-bold text-lg rounded-lg">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
