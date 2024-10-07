@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show"
    class="fixed top-0 z-50 w-full px-24 py-3 text-center text-white transform -translate-x-1/2 rounded-md lg:w-1/3 md:w-1/2 bg-ultra-violet left-1/2">
    <p>
        {{session('message')}}
    </p>
</div>
@endif