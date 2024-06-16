<div id="model-base" class="hidden flex flex-col fixed inset-0 z-20 justify-center items-center bg-black backdrop-blur-sm bg-opacity-50">
    <div class="flex flex-col min-w-[400px]">
        {{-- header --}}
        <div class="flex justify-end w-100 bg-sky-200 border-bottom px-4 py-1">
            {{-- close button --}}
            <button id="close-model" class="hover:bg-red-100 w-8 h-8 rounded">
                <i class="fa fa-xmark text-red-600 hover:text-xl m-auto"></i>
            </button>
        </div>
        <div class="p-3 w-100 bg-gray-100 z-40 shadow-xl">
            {{ $slot }}     
        </div>
    </div>
</div>

<script>

const showPopup = document.getElementById('popup');
const modelBase = document.getElementById('model-base');
const closeModel = document.getElementById('close-model')

// triggers to show the popup 
showPopup.addEventListener('click', (e) => {
    e.preventDefault();
    modelBase.classList.remove('hidden')
})

// close the popup
closeModel.addEventListener('click', (e) => {
    modelBase.classList.add('hidden')
})
</script>