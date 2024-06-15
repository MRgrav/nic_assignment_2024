<input 
    type="text" 
    name="phone" 
    id="" 
    placeholder="phone number" 
    autocomplete="{{ $autocomplete ?? '' }}" 
    class="w-full px-4 py-2 border border-gray-200 rounded mb-3 focus:outline focus:outline-1 focus:outline-gray-400"
    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
>