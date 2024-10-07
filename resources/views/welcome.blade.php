<x-layout>
    <div class="relative inset-0 w-full h-[calc(100vh-5rem)] overflow-hidden rounded-b-3xl">
        <img class="z-0 object-cover w-full h-full" src="/img/sean-oulashin-KMn4VEeEPR8-unsplash.jpg"
            alt="Travel timeline">

        <div class="absolute z-10 flex flex-col items-center w-full px-2 space-y-8 md:px-0 top-1/4">
            <h1
                class="text-4xl font-black tracking-tight text-center md:text-5xl lg:text-6xl text-slate-800 lg:font-extra-bold lg:tracking-wide">
                Keep your memories alive!
            </h1>
            <p class="leading-8 text-center text-gray-800 text-md md:text-lg">
                @auth
                Plan your next trip or add previous ones.
                @else
                Create an account to save all your trips.
                @endauth
                <br> Get inspiration and inspire others.
            </p>

            <div class="text-xs font-semibold uppercase text-slate-100 md:text-sm">
                @auth
                <a href="/travels/create" class="px-6 py-4 border rounded-md bg-ultra-violet border-ultra-violet">Create
                    travel</a>
                @else
                <a href="/register" class="px-6 py-4 border rounded-md bg-ultra-violet border-ultra-violet">Register
                    now</a>
                @endauth
            </div>
            <div class="flex flex-row justify-center gap-4 pt-4 text-sm font-semibold">
                <span class="p-2 border border-gray-300 rounded-md bg-custom-white text-ultra-violet">#travel</span>
                <span class="p-2 border border-gray-300 rounded-md bg-custom-white text-ultra-violet">#happiness</span>
                <span class="p-2 border border-gray-300 rounded-md bg-custom-white text-ultra-violet">#let's
                    go!</span>
            </div>

        </div>


    </div>


    <div class="flex flex-col items-center w-full px-2 lg:w-2/4">
        <h1 class="text-6xl font-black text-center md:text-8xl lg:text-9xl text-slate-100 tracking-extra-wide">TRAVEL
        </h1>

        <div
            class="flex flex-col items-center justify-center w-3/4 mx-auto mt-12 md:space-x-8 md:w-full gap-y-4 md:flex-row align-center">

            <div
                class="flex flex-row justify-center w-full px-6 py-4 space-x-2 rounded-md shadow-xl bg-ultra-violet text-custom-white">
                <h1 class="font-bold">{{$createdTravels}}</h1>
                <p class="font-thin text-center">Created Travels</p>
            </div>

            <div
                class="flex justify-center w-full px-6 py-4 space-x-2 rounded-md shadow-xl bg-ultra-violet text-custom-white">
                <h1 class="font-bold">{{$registeredUsers}}</h1>
                <p class="font-thin text-center">Registered Users</p>
            </div>

            <div
                class="flex justify-center w-full px-6 py-4 space-x-2 rounded-md shadow-xl bg-ultra-violet text-custom-white">
                <h1 class="font-bold">€ 0</h1>
                <p class="font-thin text-center">Costs</p>
            </div>
        </div>
    </div>


    <div class="grid w-full grid-cols-1 gap-8 px-8 pt-16 md:grid-cols-2 lg:grid-cols-3 md:px-20 xl:px-72 2xl:px-88">
        @foreach ($allTravels as $singleTravel)
        <x-travel-card-home :travel="$singleTravel" :months="$months" :users="$allUsers" />
        @endforeach

    </div>

</x-layout>