<nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-800 via-gray-900 to-black text-white shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo and Links -->
            <div class="flex items-center space-x-10">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/WebJaTitileIcon.png') }}" alt="Logo" class="w-12 h-12 rounded-full shadow-md" />
                    <span class="font-bold text-lg text-white">WebJa</span>
                </a>

                <!-- Links -->
                <div class="hidden space-x-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-nav-link>
                    <x-nav-link :href="route('post.addpost')" :active="request()->routeIs('post.addpost')">
                        {{ __('Add Post') }}
                    </x-nav-link>
                    <x-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                        {{ __('Show Post') }}
                    </x-nav-link>
                    
                    <!-- Add Course Link: Only for Admin -->
                    @auth
                        @if (Auth::user()->usertype === 'admin')
                            <x-nav-link :href="route('courses.create')" :active="request()->routeIs('courses.create')">
                                {{ __('Add Course') }}
                            </x-nav-link>
                            <x-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.index')">
                                {{ __('Show Course') }}
                            </x-nav-link>
                        @endif
                    @endauth
                    
                    
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex items-center space-x-6">
                <div class="relative" data-dropdown-container>
                    <button
                        class="flex items-center px-4 py-2 bg-gray-700 text-white rounded-lg shadow hover:bg-gray-600 transition"
                        data-dropdown-trigger>
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="dropdown-content hidden absolute right-0 mt-2 bg-gray-800 text-white rounded-lg shadow-md">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger Menu -->
            <div class="sm:hidden">
                <button @click="open = !open" class="p-2 text-white rounded-md">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-gray-800 text-white shadow-md">
        <div class="space-y-1 px-4 py-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('post.addpost')" :active="request()->routeIs('post.addpost')">
                {{ __('Add Post') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                {{ __('Show Post') }}
            </x-responsive-nav-link>
            
            <!-- Add Course Link: Only for Admin -->
            @auth
                @if (Auth::user()->usertype === 'admin')
                    <x-responsive-nav-link :href="route('courses.create')" :active="request()->routeIs('courses.create')">
                        {{ __('Add Course') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
            
        </div>
        <div class="border-t border-gray-700 px-4 py-2">
            <div class="text-white">{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownTriggers = document.querySelectorAll('[data-dropdown-trigger]');
        dropdownTriggers.forEach(trigger => {
            trigger.addEventListener('click', (event) => {
                event.stopPropagation();
                const dropdownContent = trigger.nextElementSibling;

                dropdownContent.classList.toggle('hidden');
            });
        });

        document.addEventListener('click', () => {
            document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        });
    });
</script>
