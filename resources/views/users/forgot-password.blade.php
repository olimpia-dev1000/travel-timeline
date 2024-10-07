<x-layout>
    <x-card>


        <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">Reset your password
                </h2>
            </div>


            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/users/forgot-password" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value={{old('email')}}>

                            @error('email')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-keppel px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Request
                            new password</button>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-layout>