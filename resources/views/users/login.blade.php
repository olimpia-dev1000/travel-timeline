<x-layout>
    <x-card>

        <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
        <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                {{-- <img class="w-auto h-10 mx-auto"
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> --}}
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">Log into your
                    account
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/users/authenticate" method="POST">
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
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            {{-- <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                    password?</a>
                            </div> --}}
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="p-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <a class="text-sm text-left text-gray-500  hover:underline" href="/users/forgot-password">
                                Forgot your
                                password?</a>

                        </div>

                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-keppel px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                    </div>
                </form>

                <p class="mt-4 text-sm text-center text-gray-500">
                    Or:
                </p>

                <a href="/users/authenticate/google/redirect"
                    class="mt-4 flex gap-2 w-full justify-center border rounded-md bg-custom-white px-3 py-1.5 text-sm font-normal leading-6 text-slate-800 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy"
                        alt="google logo">
                    <span>Continue with Google</span>
                </a>


                <p class="mt-10 text-sm text-center text-gray-500">
                    Don't have an account?
                    <a href="/register" class="font-semibold leading-6 text-keppel">Register</a>

            </div>
        </div>
    </x-card>

</x-layout>