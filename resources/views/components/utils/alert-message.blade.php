

@if (session('icon') && session('message'))
    @php
        $bgStyle = session('icon') === 'success' ? "bg-green-300 shadow-green-500": "bg-red-300 shadow-red-500";    
    @endphp
    <div id="alert-base" class="flex flex-col fixed inset-0 justify-start items-end bg-black bg-opacity-20">
        <div class="flex flex-col min-w-[400px] m-4">
            <div class="p-3 w-100 z-50 rounded-lg border-2 shadow-lg {{ $bgStyle }} ">
                @if ( session('icon') === 'success' )
                    <i class="fa-solid fa-circle-check"></i>
                @else
                <i class="fa-solid fa-circle-check"></i>
                @endif
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

<script>
    setTimeout(() => {
       document.getElementById('alert-base').classList.add('hidden'); 
    }, 2500);
</script>

