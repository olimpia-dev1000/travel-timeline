@props(['travel', 'months'])

<div class="overflow-hidden border rounded-lg shadow-sm bg-custom-white ">

    <div class="relative h-2/4">
        {{-- <img src="{{$travel->travel_pictures ? asset('storage/' . $travel->travel_pictures) : "
            https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?q=80&w=3269&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"}}"
            alt="Travel" class="object-cover w-full h-full"> --}}
        <img src="{{$travel->travel_pictures ? Storage::disk('s3')->temporaryUrl($travel->travel_pictures, '+2 minutes') : "
            https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?q=80&w=3269&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"}}"
            alt="Travel" class="object-cover w-full h-full">

        @if($travel->private == true)
        <span
            class="absolute bottom-0 right-0 p-2 text-xs font-semibold text-gray-100 uppercase bg-red-900 rounded">Private</span>

        @else
        <span
            class="absolute bottom-0 right-0 p-2 text-xs font-semibold text-gray-100 uppercase bg-green-900 rounded">Public</span>

        @endif
    </div>

    <div class="p-6">
        <div class="text-sm font-semibold text-gray-400">
            <span class="">{{$travel->year}}</span>
            <span>{{$months[$travel->month]}}</span>
        </div>

        <h1 class="mt-1 text-lg font-bold uppercase text-bleu-de-france">{{$travel->country}}</h1>


        <p class="mt-1 font-light text-gray-700 truncate">{{$travel->description}}</p>

        <div class="flex flex-row mt-6 text-xs font-normal">

            <form method="POST" action="/travels/{{$travel->id}}/delete">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure you want to delete this trip?')" type="submit"
                    class="text-red-500">Delete</button>
            </form>

            <form method="GET" action="/travels/{{$travel->id}}/edit">
                @csrf
                <button type="submit" class="ml-4 text-blue-500">Edit</button>
            </form>
        </div>
    </div>
</div>