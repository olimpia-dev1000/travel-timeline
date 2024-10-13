@props(['active' => false, 'mobileMenu' => false])

<a class="{{ $active ? 'text-ultra-violet' : '' }} {{ $mobileMenu ? 'block px-3 py-2 -mx-3 text-base font-medium leading-7 text-gray-800 rounded-lg hover:bg-gray-50"' : '
    text-sm font-medium leading-6'}} "
    aria-current=" {{ $active ? 'page' : 'false' }}" {{$attributes}}>{{$slot}}</a>