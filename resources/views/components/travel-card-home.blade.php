@props(['travel', 'users', 'months'])

<div class="w-full overflow-hidden border rounded-lg shadow-sm bg-custom-white">

    <div class="relative h-3/5">
        {{-- <img loading="lazy" class="object-cover w-full h-full"
            src="{{$travel->travel_pictures ? asset('storage/' . $travel->travel_pictures) : "
            https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?q=80&w=3269&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"}}"
            alt="Travel"> --}}
        <img loading="lazy" class="object-cover w-full h-full"
            src="{{$travel->travel_pictures ? Storage::disk('s3')->temporaryUrl($travel->travel_pictures, '+2 minutes') : "
            https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?q=80&w=3269&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"}}"
            alt="Travel">





        <span
            class="absolute bottom-0 right-0 p-2 text-xs font-semibold text-gray-100 capitalize rounded bg-slate-900">{{$users[$travel->user_id]}}</span>
    </div>

    <div class="p-6">
        <div class="text-sm font-semibold text-gray-400">
            <span class="">{{$travel->year}}</span>
            <span>{{$months[$travel->month]}}</span>

        </div>

        <h1 class="mt-1 text-lg font-bold uppercase text-bleu-de-france">{{$travel->country}}</h1>


        <p class="mt-1 font-light text-gray-700 truncate">{{$travel->description}}</p>
    </div>
</div>