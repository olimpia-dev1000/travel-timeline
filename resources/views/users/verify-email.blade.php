<x-layout>
    <x-card>

        <span class="mt-10 text-sm text-center text-gray-500">An email has been sent with verification link.</span>
        <br>
        <span class="mt-10 text-sm text-center text-gray-500">If you did not receive an email please click on the button
            below.</span>

        <form action="/register/verify/verification-notification" method="POST">
            @csrf

            <button type="submit"
                class="mt-8 flex w-full justify-center rounded-md bg-keppel px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Resend
                e-mail</button>
        </form>


    </x-card>

</x-layout>