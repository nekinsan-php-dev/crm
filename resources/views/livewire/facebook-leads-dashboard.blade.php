<div>
<div class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-blue-600">FB LeadTracker</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <button wire:click="syncFacebookLeads" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sync Facebook Leads
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-3xl font-bold text-gray-900">
                Facebook Leads Analytics Dashboard
            </h1>
            <p class="mt-2 text-gray-600">
                Here's an overview of your Facebook leads performance.
            </p>
        </div>

        <div class="mt-8">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Leads Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Total Facebook Leads
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-blue-600">
                            {{ $totalLeads }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                            <span class="text-green-500 font-semibold">↑ 5% </span>
                            <span class="text-gray-900">from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Conversion Rate Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Conversion Rate
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-green-600">
                            {{ $conversionRate }}%
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                            <span class="text-green-500 font-semibold">↑ 2% </span>
                            <span class="text-gray-900">from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Average Deal Size Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Avg. Deal Size
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-blue-600">
                            ${{ $avgDealSize }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                            <span class="text-red-500 font-semibold">↓ 1% </span>
                            <span class="text-gray-900">from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Lead Quality Score Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Lead Quality Score
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold text-yellow-600">
                            {{ $leadQualityScore }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                            <span class="text-green-500 font-semibold">↑ 0.5 </span>
                            <span class="text-gray-900">from last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
            <!-- Lead Sources Chart -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Lead Sources</h3>
                    <div class="mt-5">
                        <canvas id="leadSourcesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Lead Status Chart -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Lead Status</h3>
                    <div class="mt-5">
                        <canvas id="leadStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Leads Table -->
        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Leads</h3>
                <button class="bg-blue-100 text-blue-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    View All
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Source
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($recentLeads as $lead)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($lead['name']) }}&color=7F9CF5&background=EBF4FF" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $lead['name'] }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $lead['email'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $lead['source'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $lead['status'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $lead['created_at'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        var leadSourcesCtx = document.getElementById('leadSourcesChart').getContext('2d');
        var leadSourcesChart = new Chart(leadSourcesCtx, {
            type: 'doughnut',
            data: {
                labels: @json($leadSources['labels']),
                datasets: [{
                    data: @json($leadSources['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Lead Sources Distribution'
                    }
                }
            }
        });

        var leadStatusCtx = document.getElementById('leadStatusChart').getContext('2d');
        var leadStatusChart = new Chart(leadStatusCtx, {
            type: 'bar',
            data: {
                labels: @json($leadStatus['labels']),
                datasets: [{
                    label: 'Number of Leads',
                    data: @json($leadStatus['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Lead Status Distribution'
                    }
                }
            }
        });

        Livewire.on('leadsUpdated', () => {
            leadSourcesChart.update();
            leadStatusChart.update();
        });
    });
</script>
@endpush

</div>