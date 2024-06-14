<x-layouts.body>

    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            {{-- <x-layouts.header/> --}}
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 h-screen">
                    <div class="py-4 px-2 font-bold text-4xl">
                        Admin
                    </div>
                    <!-- Content area -->
                    <div class="flex flex-wrap">
                        <div class="flex-1 w-1/2 min-w-[300px] m-2 h-72 border bg-white border shadow-lg p-5 lg:p-12">
                            <p class="text-8xl ordinal font-bold text-blue-800">24k</p>
                            <p class="text-green-600 my-3">20% up</p>
                        </div>
                        <div class="flex-1 w-1/2 min-w-[300px] m-2 h-72 border bg-white border rounded shadow-lg p-5">

                        </div>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

</x-layouts.body>