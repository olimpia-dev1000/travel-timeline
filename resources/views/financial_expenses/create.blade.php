<x-layout>

    <x-card>


        @if (count($categories) > 0)

        <form method="POST" autocomplete="off" action="/travels/{{$travel->id}}/financial-expenses/add">
            @csrf
            <div class="space-y-12">
                <div class="pb-12 border-b border-gray-900/10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Financial expenses</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Add a new position.</p>

                    {{-- Category Field--}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="expenses_categories_id"
                                class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                            <div class="mt-2">
                                <div class="relative sm:max-w-md">
                                    <select name="expenses_categories_id" id="expenses_categories_id"
                                        class="block w-full py-2 pl-2 pr-8 text-gray-900 border-0 rounded-md appearance-none ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>

                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
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

                    {{-- End category field --}}


                    {{-- Amount number field --}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md form-group">

                                    <input type="number" name="amount" id="amount"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="..." value="{{old('amount')}}">
                                </div>
                                @error('amount')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- end Amount number field --}}


                    {{-- Financial expense description text field --}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md form-group">

                                    <input type="text" name="description" id="description"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="..." value="{{old('description')}}">
                                </div>
                                @error('description')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Financial expense description field --}}


                </div>
            </div>


            <div class="flex items-center justify-end mt-6 gap-x-6">
                <a href="{{URL::previous()}}"><button type="button"
                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                <button type="submit"
                    class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-keppel focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>

        </form>

        @else

        <p><a href="/travels/financial-expenses/categories/add"><span class="underline text-sky-600">Add</span></a>
            your
            first
            financial expense category.</p>

        @endif




    </x-card>

</x-layout>