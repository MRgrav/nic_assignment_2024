<x-layouts.body>

    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            {{-- <x-layouts.header/> --}}
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-4 py-8  h-screen">
                    <div class="py-4 px-2 font-bold text-4xl">
                        Admin
                    </div>
                    <!-- Content area -->
                    <div class="flex">
                        <div class="flex-1 rounded-4 bg-green-200">
                            a
                        </div>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

</x-layouts.body>