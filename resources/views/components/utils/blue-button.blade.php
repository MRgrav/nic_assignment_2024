<button 
    type="{{ $type ?? 'button' }}" 
    id="{{ $id ?? '' }}"
    class="flex flex-nowrap items-center bg-blue-600 shadow-md text-white px-4 py-1.5 rounded hover:bg-blue-700 focus:bg-blue-500 m-1">
    {{ $slot }}
</button>