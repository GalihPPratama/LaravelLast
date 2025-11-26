@props(['active' => false])

<a {{ $attributes->merge([
    'class' => ($active ?? false)
        ? 'flex items-center w-full p-2 text-base font-medium text-white bg-gray-700 rounded-lg'
        : 'flex items-center w-full p-2 text-base font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-150'
]) }}>
    {{ $slot }}
</a>