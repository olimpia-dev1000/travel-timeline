<div x-data="{ mobileMenuOpen: false }">
    <nav class="static top-0 flex items-center justify-between h-20 p-6 shadow-sm bg-keppel text-slate-100 font- lg:px-8"
        aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <h1 class="text-xl font-bold uppercase">Travel timeline</h1>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <x-nav-link href="/travels/create" :active="request()->is('travels/create')">Create travel</x-nav-link>
            @auth
            <x-nav-link href="/travels" :active="request()->is('travels')">My travels</x-nav-link>
            @endauth
            @auth
            <x-nav-link href="/users/change-password" :active="request()->is('users/change-password')">Change password
            </x-nav-link>
            @endauth
        </div>
        <div class="flex flex-row items-center hidden lg:space-x-2 lg:flex lg:flex-1 lg:justify-end">

            @auth
            <span class="text-sm font-normal text-center">Welcome
                {{ucfirst(Auth::user()->name)}}!</span>
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button type="submit" class="px-6 py-2 ml-4 text-sm font-semibold border rounded-md border-slate-100"
                    onclick="return confirm('Are you sure you want to log out?')">
                    Logout
                </button>
            </form>
            @else
            <a href="/login"
                class="px-6 py-2 text-sm font-semibold border rounded-md text-slate-100 border-slate-100 ">Login
                <span aria-hidden="true"></span></a>

            <a href="/register" class="px-6 py-2 text-sm font-light rounded-md text-slate-100 bg-ultra-violet ">Sign
                Up</a>

            @endauth

        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="mobileMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full px-6 py-6 overflow-y-auto bg-custom-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="/" class="-m-1.5 p-1.5">
                    <h1 class="text-xl font-bold">Travel timeline.</h1>
                </a>


                <button @click="mobileMenuOpen = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>


            </div>
            <div class="flow-root mt-6">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="py-6 space-y-2">

                        <x-nav-link href="/travels/create" :active="request()->is('travels/create')" :mobileMenu="true">
                            Create travel
                        </x-nav-link>
                        @auth
                        <x-nav-link href="/travels" :active="request()->is('travels')" :mobileMenu="true">
                            My travels
                        </x-nav-link>
                        @endauth
                        {{-- <a href="/travels/inspiratons"
                            class="block px-3 py-2 -mx-3 text-base font-medium leading-7 text-gray-800 rounded-lg hover:bg-gray-50">Inspirations</a>
                        --}}
                        @auth
                        <x-nav-link href="/users/change-password" :active="request()->is('users/change-password')"
                            :mobileMenu="true">
                            Change password
                        </x-nav-link>
                        @endauth



                    </div>
                    <div class="py-6">

                        @auth
                        <span
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-normal leading-7 text-gray-900">Welcome
                            {{ucfirst(Auth::user()->name)}}!</span>


                        <form method="POST" action="/logout" class="inline">
                            @csrf

                            <button type="submit"
                                class="mt-4 px-6 py-2.5 text-base font-semibold border rounded-md text-keppel border-keppel"
                                onclick="return confirm('Are you sure you want to log out?')">
                                Logout
                            </button>
                        </form>


                        @else

                        <a href="/login"
                            class=" px-6 py-2.5 text-base font-semibold border rounded-md text-keppel border-keppel ">Login
                            <span aria-hidden="true"></span></a>

                        <a href="/register"
                            class=" px-6 py-2.5 ml-4 text-base font-light rounded-md text-text-custom-gray bg-keppel ">Sign
                            Up</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>