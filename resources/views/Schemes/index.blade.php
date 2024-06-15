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
                        <div class="flex flex-wrap w-full mb-2">
                            <div class="flex flex-initial max-w-[400px] w-full items-center">
                                <x-utils.text-input name="search" placeholder="search..." autocomplete="off"/>
                            </div>
                            <div class="flex flex-1 justify-end items-center">
                                <x-utils.green-button id="popup">
                                    <i class="fa fa-angle-down me-1"></i>
                                    import
                                </x-utils.green-button>
                                <x-utils.blue-button>
                                    <i class="fa fa-angle-up me-1"></i>
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
    <x-utils.popup>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex items-center p-2 border-b-2 border-gray-400">
                <x-utils.doc-file-input :name="'file'" id="excelInput" accept=".xlsx"/>
                <x-utils.green-button>upload</x-utils.green-button>
            </div>
        </form>
        <div id="excelPreview" class="flex p-2">

        </div>
    </x-utils.popup>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('excelInput');
        const previewContainer = document.getElementById('excelPreview');
    
        fileInput.addEventListener('change', (event) => {
            console.log(fileInput)
            const file = event.target.files[0];
    
            if (file) {
                const reader = new FileReader();
    
                reader.onload = function (e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    // Assuming the first sheet name is 'Sheet1'
                    const firstSheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[firstSheetName];
                    // Convert worksheet to HTML table
                    const htmlTable = XLSX.utils.sheet_to_html(worksheet);
                    // Display HTML table in preview container
                    previewContainer.innerHTML = htmlTable;
                };
                // Read file as binary data
                reader.readAsArrayBuffer(file);
            }
        });
    });
    
    </script>

</x-layouts.body>