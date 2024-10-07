<x-layout>

    <x-card>
        <form method="POST" autocomplete="off" action="/travels/financial-expenses/categories/add">
            @csrf

            <div class="space-y-12">
                <div class="pb-12 border-b border-gray-900/10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Category</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Add a category for financial expenses.</p>




                    {{-- Category text field --}}
                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            {{-- <label for="category"
                                class="block text-sm font-medium leading-6 text-gray-900">Category</label> --}}
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md form-group">

                                    <input type="text" name="category" id="category"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="f.e. Restaurants" value="{{old('category')}}">

                                </div>
                                @error('category')
                                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Category country text field --}}


                </div>
            </div>


            <div class="flex items-center justify-end mt-6 gap-x-6">
                <a href="/"><button type="button"
                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                <button type="submit"
                    class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-keppel focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>

        </form>

    </x-card>

</x-layout>