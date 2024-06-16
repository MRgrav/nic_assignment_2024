<x-layouts.body>
    {{-- {{ dd($schemes); }} --}}
    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            {{-- <x-layouts.header/> --}}
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 h-screen">
                    <div class="py-4 px-2 font-bold text-2xl">
                        Profile
                    </div>

                    <div class="w-full p-2 py-4 ">
                        <div class="mx-auto flex flex-col max-w-[500px] bg-white shadow-lg border rounded-md p-4">
                            <div class="flex w-full">
                                <p class="p-2 w-1/2">Name</p>
                                <p class="p-2 w-1/2">{{ $user->name }}</p>
                            </div>
                            <div class="flex w-full">
                                <p class="p-2 w-1/2">Email address</p>
                                <p class="p-2 w-1/2">{{ $user->email }}</p>
                            </div>
                            <div class="flex w-full">
                                <p class="p-2 w-1/2">Phone Number</p>
                                <p class="p-2 w-1/2">{{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>
    <x-utils.popup>

    </x-utils.popup>

</x-layouts.body>