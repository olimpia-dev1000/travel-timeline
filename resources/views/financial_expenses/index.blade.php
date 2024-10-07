<x-layout>

    @if(count($expenses) > 0)

    @foreach ($expenses as $expense)
    <x-card>

        <div class="flex flex-row content-center justify-between">

            @foreach ($categories->where('id', $expense->expenses_category_id) as $category)
            <p>{{ $category->category }}</p>
            @endforeach
            <p>{{$expense->amount}}</p>
            <p>{{$expense->description}}</p>


            <div class="flex text-xs font-normal flex-row-6">

                <form class="flex object-center" method="POST"
                    action="/travels/{{$travel->id}}/financial-expenses/{{$expense->id}}/delete">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure you want to delete this expense?')" type="submit"
                        class="text-red-500">Delete</button>
                </form>

                <form class="flex object-center" method="GET" action="/travels/{{$travel->id}}/financial-expenses/edit">
                    @csrf
                    <button type="submit" class="ml-4 text-blue-500">Edit</button>
                </form>
            </div>

        </div>



    </x-card>
    @endforeach

    @else

    <x-card>
        <p><a href="/travels/{{$travel->id}}/financial-expenses/add"><span class="underline text-sky-600">Add</span></a>
            your
            first
            expense</p>

    </x-card>

    @endif
    <x-card>
        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="{{URL::previous()}}"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Go
                    back</button></a>
            <a href="/travels/{{$travel->id}}/financial-expenses/add"><button type="button"
                    class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-keppel">Add
                    expense</button></a>
        </div>
    </x-card>





</x-layout>