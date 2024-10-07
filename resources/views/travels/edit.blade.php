<x-layout>

    <div class="flex flex-row gap-4 mt-8">


        <a class="px-3 py-2 mt-8 text-xs border rounded-md bg-ultra-violet border-ultra-violet text-custom-white"
            href="/travels/{{$travel->id}}/financial-expenses">Manage
            financial
            expenses</a>
        <a class="px-3 py-2 mt-8 text-xs border rounded-md bg-ultra-violet border-ultra-violet text-custom-white "
            href="/travels/financial-expenses/categories">Manage
            financial
            expenses categories</a>

    </div>

    <x-card>
        <form method="POST" action="/travels/{{$travel->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-12">
                <div class="pb-12 border-b border-gray-900/10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Travel</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                        careful what you share.</p>


                    {{-- Country text field --}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="country"
                                class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="country" id="country" autocomplete="country"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="The Netherlands" value="{{$travel->country}}">

                                </div>
                                @error('country')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- End country text field --}}



                    {{-- City text field --}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="city" id="city" autocomplete="city"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="The Hague" value="{{$travel->city}}">
                                </div>
                                @error('city')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- End city text field --}}

                    {{-- year field --}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="year" class="block text-sm font-medium leading-6 text-gray-900">Year</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="year" id="year" autocomplete="year"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="2024" value="{{$travel->year}}">
                                </div>
                                @error('year')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- End year text field --}}
                    {{-- Month Field--}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="month" class="block text-sm font-medium leading-6 text-gray-900">Month</label>
                            <div class="mt-2">
                                <div class="relative sm:max-w-md">
                                    <select name="month" id="month"
                                        class="block w-full py-2 pl-2 pr-8 text-gray-900 border-0 rounded-md appearance-none ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                        @foreach($months as $key => $month)
                                        <option value="{{ $key }}" @selected($key==$travel->month)>
                                            {{ $month }}
                                        </option>
                                        @endforeach

                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('month')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- End month field --}}

                    {{-- Description field --}}

                    <div class="mt-6 col-span-full">
                        <label for="description"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$travel->description}}</textarea>
                        </div>
                        @error('description')
                        <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                        @enderror
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about your travel.</p>
                    </div>

                    {{-- End Description field --}}


                    {{-- File Field--}}

                    <div class="mt-6 col-span-full">
                        <div class="mt-2">

                            <label class="block text-sm font-medium leading-6 text-gray-900"
                                for="travel_pictures">Upload new
                                file</label>
                            <input
                                class="file:text-white file:bg-keppel file:border-none file:cursor-pointer file:rounded-md file:px-2 block w-full mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-600  py-1.5 pl-2"
                                id="travel_pictures" name="travel_pictures" type="file">
                            <p class="mt-2 text-sm leading-6 text-gray-600">JPEG, PNG, JPG or GIF</p>

                            @if($travel->travel_pictures)
                            <img class="w-48 mb-6 mr-6"
                                src="{{Storage::disk('s3')->temporaryUrl($travel->travel_pictures, '+2 minutes')}}"
                                alt="Travel" />
                            @endif
                        </div>
                        @error('travel_pictures')
                        <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- end File Field--}}

                    <div class="mt-6 col-span-full">
                        <label for="private" class="inline-flex items-center cursor-pointer">


                            <input type="checkbox" value="1" name="private" id="private" class="sr-only peer"
                                @checked($travel->private)>


                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="text-sm font-medium text-gray-400 ms-3 peer-checked:text-gray-900 ">Private</span>
                        </label>

                    </div>



                </div>
                <div class="flex items-center justify-end mt-6 gap-x-6">
                    <a href="/travels"><button type="button"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                    <button type="submit"
                        class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-keppel hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
        </form>
    </x-card>
</x-layout>