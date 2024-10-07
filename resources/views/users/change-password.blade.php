<x-layout>
    <x-card>

        <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                {{-- <img class="w-auto h-10 mx-auto"
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> --}}
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-center text-gray-900"> Set new password
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/users/change-password" method="POST">
                    @csrf
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="current_password"
                                class="block text-sm font-medium leading-6 text-gray-900">Current password</label>

                        </div>
                        <div class="mt-2">
                            <input id="current_password" name="current_password" type="password"
                                autocomplete="current-password" required
                                class="p-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('current_password')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>

                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="p-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmation"
                                class="block text-sm font-medium leading-6 text-gray-900">Password confirmation</label>
                        </div>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('password_confirmation')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-keppel px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-layout>