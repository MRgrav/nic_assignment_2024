<x-layouts.body>

    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            {{-- <x-layouts.header/> --}}
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 min-h-screen">
                    <div class="py-4 px-2 font-bold text-4xl">
                        Admin
                    </div>
                    <!-- Content area -->
                    <div class="flex">
                        <div class="flex-1 flex flex-col justify-between w-auto m-2 rounded-lg bg-blue-500 shadow-lg shadow-sky-500 p-5 lg:p-8">
                            <p class="text-5xl ordinal font-bold text-blue-100">{{ $totalSchemes }}</p>
                            <p class="text-gray-100 text-end">Total Schemes</p>
                        </div>
                        <x-utils.white-tile>
                            <p class="text-5xl ordinal font-bold text-blue-800">{{ formatNumberForDisplay($maxTotalDisbursement[0]->total_disbursement)  }}</p>
                            @if ( $changeTotalDisbursement <= 0 )
                                <p class="text-red-600 font-semibold my-3">{{ abs(round($changeTotalDisbursement)) }}%  down <i class="fa-solid fa-arrow-trend-down"></i></p>
                            @else
                                <p class="text-green-600 font-semibold my-3">{{ abs(round($changeTotalDisbursement)) }}% up</p>
                            @endif
                            <p class="text-gray-500 text-sm">Total disbursement in {{ $maxTotalDisbursement[0]->financial_year }}</p>
                        </x-utils.white-tile>
                        <x-utils.white-tile>
                            <p class="text-5xl ordinal font-bold text-blue-800">{{ formatNumberForDisplay($maxCentralDisbursement[0]->central_disbursement)  }}</p>
                            @if ( $changeCentralDisbursement <= 0 )
                                <p class="text-red-600 font-semibold my-3">{{ abs(round($changeCentralDisbursement)) }}%  down <i class="fa-solid fa-arrow-trend-down"></i></p>
                            @else
                                <p class="text-green-600 font-semibold my-3">{{ abs(round($changeCentralDisbursement)) }}% up <i class="fa-solid fa-arrow-trend-up"></i></p>
                            @endif
                            <p class="text-gray-500 text-sm">Central disbursement in {{ $maxCentralDisbursement[0]->financial_year }}</p>
                        </x-utils.white-tile>
                        <x-utils.white-tile>
                            <p class="text-5xl ordinal font-bold text-blue-800">{{ formatNumberForDisplay($maxStateDisbursement[0]->state_disbursement)  }}</p>
                            @if ( $changeStateDisbursement <= 0 )
                                <p class="text-red-500 font-semibold my-3">{{ abs(round($changeStateDisbursement)) }}%  down <i class="fa-solid fa-arrow-trend-down"></i></p>
                            @else
                                <p class="text-green-500 font-semibold my-3">{{ abs(round($changeStateDisbursement)) }}% up <i class="fa-solid fa-arrow-trend-up"></i></p>
                            @endif
                            <p class="text-gray-500 text-sm">State disbursement in {{ $maxStateDisbursement[0]->financial_year }}</p>
                        </x-utils.white-tile>
                    </div>
                    <div class="m-2">
                        <div class="w-full p-4 my-6 shadow-lg bg-white">
                            <canvas id="myBarChart" height="100"></canvas>
                        </div>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var chartData = <?php echo json_encode($chartData); ?>;

            var labels = Object.keys(chartData);    // Scheme code
            var data = Object.values(chartData);    // Total disbursement

            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Disbursement',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return 'Total Disbursement: ' + tooltipItem.raw.toLocaleString();
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>

</x-layouts.body>