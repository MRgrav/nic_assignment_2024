<button 
    type="{{ $type ?? 'button' }}" 
    id="{{ $id ?? '' }}" 
    class="bg-red-600 shadow-md text-white px-4 py-2 rounded hover:bg-red-700">
    {{ $slot }}
</button>