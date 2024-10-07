<x-layout>

    @if(count($categories) > 0)

    @foreach ($categories as $category)
    <x-card>

        <div class="flex flex-row content-center justify-between">
            <p>{{$category->category}}</p>

            <div class="flex text-xs font-normal flex-row-6">

                <form class="flex object-center" method="POST"
                    action="/travels/financial-expenses/categories/{{$category->id}}/delete">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure you want to delete this category?')" type="submit"
                        class="text-red-500">Delete</button>
                </form>

                <form class="flex object-center" method="GET"
                    action="/travels/financial-expenses/categories/{{$category->id}}/edit">
                    @csrf
                    <button type="submit" class="ml-4 text-blue-500">Edit</button>
                </form>
            </div>

        </div>



    </x-card>
    @endforeach


    @else

    <x-card>
        <p><a href="/travels/financial-expenses/categories/add"><span class="underline text-sky-600">Add</span></a> your
            first
            category</p>

    </x-card>

    @endif
    <x-card>
        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="{{URL::previous()}}"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Go
                    back</button></a>
            <a href="/travels/financial-expenses/categories/add"><button type="button"
                    class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-keppel">Add
                    category</button></a>
        </div>
    </x-card>





</x-layout>