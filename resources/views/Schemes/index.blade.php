<x-layouts.body>

    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            {{-- <x-layouts.header/> --}}
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 h-screen">


                    <div class="w-full p-2 ring-1 ring-black ring-opacity-5">
                        <table class="table-auto min-w-full divide-gray-300 border rounded shadow-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="p-3 text-gray-900 font-semibold text-start">#</th>
                                    <th class="p-3 text-gray-900 font-semibold text-start">Scheme code</th>
                                    <th class="p-3 text-gray-900 font-semibold text-start">Scheme name</th>
                                    <th class="p-3 text-gray-900 font-semibold text-start">Scheme type</th>
                                    <th class="p-3 text-gray-900 font-semibold text-start">Financial year</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap p-3">1</td>
                                    <td class="whitespace-nowrap p-3">1</td>
                                    <td class="whitespace-nowrap p-3">1</td>
                                    <td class="whitespace-nowrap p-3">1</td>
                                    <td class="whitespace-nowrap p-3">1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

</x-layouts.body>