<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen text-gray-100">
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Update Profile Information Section -->
            <div class="bg-gray-800 bg-opacity-70 p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4 text-white">Update Profile Information</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="bg-gray-800 bg-opacity-70 p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4 text-white">Update Password</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-red-800 bg-opacity-70 p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4 text-white">Delete Account</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
