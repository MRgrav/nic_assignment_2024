<input 
    type="text" 
    name="{{ $name }}" 
    id="{{ $id ?? '' }}" 
    value="{{ $value ??  '' }}"
    placeholder="{{ $placeholder ?? '' }}"
    autocomplete="{{ $autocomplete ?? '' }}" 
    class="w-full px-4 py-2 border border-gray-200 rounded mb-3 focus:outline focus:outline-1 focus:outline-gray-400">