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
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Total Disbursement',
                        data: @json($values),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</x-layouts.body>