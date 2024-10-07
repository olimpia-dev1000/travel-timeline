<x-layout>


    <div class="max-w-xl mx-auto lg:max-w-4xl">

        <div class="flex flex-row items-center w-full p-4 mb-4 text-gray-900">
            <p class="text-sm font-medium uppercase">Sort by</p>


            <a class="px-4 py-2 mx-2 text-sm font-semibold border rounded-sm bg-custom-white"
                href="/travels?sortBy[]=year&sortBy[]=month">Date</a>

            <a class="px-4 py-2 mx-2 text-sm font-semibold border rounded-sm bg-custom-white"
                href="/travels?sortBy=country">Country</a>

            {{-- <form action="/travels?sortBy=year" method="GET">
                @csrf
                <button type="submit"
                    class="px-4 py-2 mx-2 text-sm font-semibold border rounded-sm bg-custom-white">Year</button>
            </form>
            <form action="/travels?sortBy=date" method="GET">
                @csrfv
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold border rounded-sm bg-custom-white">Date</button>
            </form> --}}
        </div>


        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @if(count($travels) > 0)

            @foreach ($travels as $travel)
            <x-travel-card :travel="$travel" :months="$months" />

            @endforeach
            @else

            <p>Add your first trip. </p>
            @endif


        </div>



        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="/"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Go back
                    home</button></a>

            <a href="/travels/create"><button type="button"
                    class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-keppel">Create
                    travel</button></a>
        </div>



</x-layout>