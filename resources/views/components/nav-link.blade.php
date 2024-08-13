@props(['active' => false])

<li>
    <a
        {{$attributes}}
        class="{{ $active ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900  hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }} block rounded px-3 py-2 md:p-0 "
        aria-current="{{ $active ? 'page': 'false'}}">
        {{ $slot }}
    </a>
</li>
