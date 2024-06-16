<x-layouts.body>
    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 h-screen">
                    <div class="py-4 px-2 font-bold text-2xl">
                        Schemes
                    </div>

                    <div class="w-full bg-gray-50 p-2 ring-1 ring-black ring-opacity-5">
                        <div class="flex flex-wrap w-full mb-2">
                            
                            <div class="flex flex-1 justify-end items-center">
                                {{-- import button --}}
                                <x-utils.green-button id="popup">
                                    <i class="fa fa-angle-down me-1"></i>
                                    import
                                </x-utils.green-button>
                                {{-- export or download button --}}
                                <x-utils.blue-button id="export">
                                    <i class="fa fa-angle-up me-1"></i>
                                    export
                                </x-utils.blue-button>
                                <a id="export-route" href="{{ route('export-schemes') }}" class="hidden"></a>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table-auto min-w-full divide-gray-400 ">
                                <thead class="bg-gray-100 uppercase text-gray-600 font-semibold text-sm">
                                    <tr>
                                        <th class="p-3 text-start">#</th>
                                        <th class="p-3 text-start">Scheme code</th>
                                        <th class="p-3 text-start">Scheme name</th>
                                        <th class="p-3 text-start">Scheme type</th>
                                        <th class="p-3 text-center">Financial year</th>
                                        <th class="p-3 text-end">state disbursement</th>
                                        <th class="p-3 text-end">central disbursement</th>
                                        <th class="p-3 text-end">total disbursement</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-sm">
                                    @foreach ($schemes as $scheme)
                                    <tr>
                                        <td class="whitespace-nowrap p-3 font-semibold">{{ $scheme->id }}</td>
                                        <td class="whitespace-nowrap p-3">{{ $scheme->scheme_code }}</td>
                                        <td class="whitespace-nowrap p-3 truncate max-w-[300px]">{{ $scheme->scheme_name }}</td>
                                        <td class="whitespace-nowrap p-3">{{ $scheme->central_state_scheme }}</td>
                                        <td class="whitespace-nowrap p-3 text-center tabular-nums">{{ $scheme->financial_year }}</td>
                                        <td class="whitespace-nowrap p-3 text-end tabular-nums">{{ $scheme->state_disbursement }}</td>
                                        <td class="whitespace-nowrap p-3 text-end tabular-nums">{{ $scheme->central_disbursement }}</td>
                                        <td class="whitespace-nowrap p-3 text-end tabular-nums">{{ $scheme->total_disbursement }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="flex justify-between mt-6 mb-3 px-3">
                            {{-- current pagination page details --}}
                            <div class="text-gray-500">
                                Showing {{ $schemes->firstItem() }} to {{ $schemes->lastItem() }} of {{ $schemes->total() }} entries
                            </div>
                            <div class="flex">
                                {{-- previous page button --}}
                                @if ($schemes->onFirstPage())
                                    <span class="px-2 py-1 rounded-l-md text-gray-500 cursor-not-allowed bg-gray-200">Previous</span>
                                @else
                                    <a href="{{ $schemes->previousPageUrl() }}" class="px-2 py-1 rounded-l-md hover:bg-gray-100 text-indigo-500">Previous</a>
                                @endif
                                {{-- all pages buttons --}}
                                @for ($i = 1; $i <= $schemes->lastPage(); $i++)
                                    @if ($i === $schemes->currentPage())
                                        <span class="px-2 py-1 bg-indigo-500 text-white">{{ $i }}</span>
                                    @else
                                        <a href="{{ $schemes->url($i) }}" class="px-2 py-1 border hover:bg-gray-100 text-indigo-500 ">{{ $i }}</a>
                                    @endif
                                @endfor
                                {{-- next page button --}}
                                @if ($schemes->hasMorePages())
                                    <a href="{{ $schemes->nextPageUrl() }}" class="px-2 py-1 rounded-r-md bg-gray-200 text-indigo-500">Next</a>
                                @else
                                    <span class="px-2 py-1 rounded-r-md text-gray-500 cursor-not-allowed bg-gray-200">Next</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>
    <x-utils.popup>
        {{-- excel file import form --}}
        <form action="{{ route('import-schemes') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="border-b-2 border-gray-400">
                <div class="flex items-center p-2">
                    <x-utils.doc-file-input :name="'file'" id="excelInput" accept=".xlsx, .xls"/>
                    <x-utils.green-button type="submit">upload</x-utils.green-button>
                </div>
                @error('file')
                    <x-utils.error-message>
                        {{ $message }}
                    </x-utils.error-message>
                @enderror
            </div>
        </form>
        {{-- preview of excel file before uploading --}}
        <div id="excelPreview" class="flex p-2 max-h-[80vh] max-w-[90vw] overflow-auto">
            {{-- preview --}}
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

        document.getElementById('export').addEventListener('click', (e) => {
            e.preventDefault();

            // Find the anchor element by its id
            const downloadAnchor = document.getElementById('export-route');
            
            // Programmatically click the anchor element
            if (downloadAnchor) {
                downloadAnchor.click();
            }          
        })
    });
    
    </script>

</x-layouts.body>