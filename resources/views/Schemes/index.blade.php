<x-layouts.body>

    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            {{-- <x-layouts.header/> --}}
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 h-screen">
                    <div class="py-4 px-2 font-bold text-2xl">
                        Schemes
                    </div>

                    <div class="w-full bg-gray-50 p-2 ring-1 ring-black ring-opacity-5">
                        <div class="flex w-full mb-2">
                            <div class="flex flex-initial max-w-[300px] items-center">
                                <x-utils.text-input name="search" placeholder="search..." autocomplete="off"/>
                            </div>
                            <div class="flex flex-1 justify-end items-center">
                                <x-utils.green-button>
                                    <i class="fa fa-angle-down"></i>
                                    import
                                </x-utils.green-button>
                                <x-utils.blue-button>
                                    <i class="fa fa-angle-up"></i>
                                    export
                                </x-utils.blue-button>
                            </div>
                        </div>
                        <table class="table-auto min-w-full divide-gray-400 ">
                            <thead class="bg-gray-100 uppercase text-gray-600 font-semibold text-sm">
                                <tr>
                                    <th class="p-3 text-start">#</th>
                                    <th class="p-3 text-start">Scheme code</th>
                                    <th class="p-3 text-start">Scheme name</th>
                                    <th class="p-3 text-start">Scheme type</th>
                                    <th class="p-3 text-start">Financial year</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td class="whitespace-nowrap p-3">1</td>
                                    @for ($j = 0; $j < 4; $j++)
                                        <td class="whitespace-nowrap p-3">Hello</td>    
                                    @endfor
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

    <div class="fixed inset-0 flex z-20 justify-center items-center bg-black backdrop-blur-sm bg-opacity-50">
        <div class="p-3 w-72 bg-gray-100 z-40 shadow-xl">
            {{-- <x-utils.text-input name="n"/> --}}
            <x-utils.doc-file-input accept=".xlsx"/>
        </div>
    </div>

</x-layouts.body>