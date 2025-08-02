@extends('admin.pages.master')

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#0a66c2',
                    primary- dark: '#084482',
                secondary: '#2c3e50',
                success: '#28a745',
                warning: '#ffc107',
                danger: '#dc3545',
                info: '#17a2b8',
                dark: '#343a40',
                light: '#f8f9fa'
            }
        }
    }
        }
</script>
<style>
    .sidebar {
        transition: all 0.3s ease;
    }

    .sidebar-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .chart-container {
        height: 280px;
    }

    .progress-bar {
        height: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #c5c5c5;
        border-radius: 3px;
    }
</style>
</head>

@section('content')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            <!-- Date Range and Filters -->
            <div class="bg-white  shadow-sm p-5 mb-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-lg font-semibold text-gray-800">Report Filters</h2>
                        <p class="text-gray-600 text-sm">Customize your report parameters</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <div class="relative">
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>Last 7 Days</option>
                                <option selected>Last 30 Days</option>
                                <option>Last 90 Days</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div class="relative">
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>All Campaigns</option>
                                <option>Tech Talent Recruitment</option>
                                <option>Remote Work Summit</option>
                                <option>Developer Bootcamp</option>
                            </select>
                        </div>
                        <button class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-filter mr-2"></i> Apply Filters
                        </button>
                        <button
                            class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center hover:bg-gray-50">
                            <i class="fas fa-download mr-2"></i> Export
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">

                <div class=" bg-white shadow-sm p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600">Impressions</p>
                            <h3 class="text-2xl font-bold mt-1">245,842</h3>
                        </div>
                        <div class="w-12 h-12  bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-eye text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center">
                        <span class="text-green-600 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 12.4%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs previous period</span>
                    </div>
                </div>

                <div class=" bg-white shadow-sm p-5 ">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600">Clicks</p>
                            <h3 class="text-2xl font-bold mt-1">6,894</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 flex items-center justify-center">
                            <i class="fas fa-mouse-pointer text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center">
                        <span class="text-green-600 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 8.7%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs previous period</span>
                    </div>
                </div>

                <div class=" bg-white shadow-sm p-5 ">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600">CTR</p>
                            <h3 class="text-2xl font-bold mt-1">2.81%</h3>
                        </div>
                        <div class="w-12 h-12  bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-percent text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center">
                        <span class="text-green-600 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 0.42%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs previous period</span>
                    </div>
                </div>

                <div class=" bg-white  shadow-sm p-5 ">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600">Spend</p>
                            <h3 class="text-2xl font-bold mt-1">$8,420</h3>
                        </div>
                        <div class="w-12 h-12  bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center">
                        <span class="text-red-600 flex items-center">
                            <i class="fas fa-arrow-down mr-1"></i> 3.1%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs previous period</span>
                    </div>
                </div>

                <div class=" bg-white  shadow-sm p-5 ">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600">Conversions</p>
                            <h3 class="text-2xl font-bold mt-1">1,248</h3>
                        </div>
                        <div class="w-12 h-12  bg-pink-100 flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-pink-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center">
                        <span class="text-green-600 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 15.2%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs previous period</span>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white  shadow-sm p-5">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="font-semibold text-gray-800">Performance Overview</h3>
                        <div>
                            <button class="text-gray-500 hover:text-gray-700 mx-1 px-3 py-1 rounded bg-gray-50">7D</button>
                            <button class="bg-primary text-white mx-1 px-3 py-1 rounded">30D</button>
                            <button class="text-gray-500 hover:text-gray-700 mx-1 px-3 py-1 rounded bg-gray-50">90D</button>
                        </div>
                    </div>
                    <div class="chart-container w-full">

                        <canvas id="adsReportChart"></canvas>

                    </div>

                    {{-- <div class="relative h-full">
                        <div
                            class="absolute bottom-0 left-0 right-0 h-3/4 bg-gradient-to-t from-blue-50 to-white rounded-lg">
                        </div>
                        <!-- Impression line -->
                        <div class="absolute bottom-10 left-0 right-0">
                            <div class="flex h-32 items-end space-x-1 px-4">
                                <div class="w-1/12 h-3/5 bg-blue-500 "></div>
                                <div class="w-1/12 h-4/5 bg-blue-500 "></div>
                                <div class="w-1/12 h-full bg-blue-500 "></div>
                                <div class="w-1/12 h-2/3 bg-blue-500 "></div>
                                <div class="w-1/12 h-1/2 bg-blue-500 "></div>
                                <div class="w-1/12 h-3/4 bg-blue-500 "></div>
                                <div class="w-1/12 h-5/6 bg-blue-500 "></div>
                                <div class="w-1/12 h-2/5 bg-blue-500 "></div>
                                <div class="w-1/12 h-3/5 bg-blue-500 "></div>
                                <div class="w-1/12 h-4/5 bg-blue-500 "></div>
                                <div class="w-1/12 h-1/2 bg-blue-500 "></div>
                                <div class="w-1/12 h-3/4 bg-blue-500 "></div>
                            </div>
                        </div>
                        <!-- Click line -->
                        <div class="absolute bottom-0 left-0 right-0">
                            <div class="flex h-32 items-end space-x-1 px-4">
                                <div class="w-1/12 h-1/3 bg-green-500 "></div>
                                <div class="w-1/12 h-2/5 bg-green-500 "></div>
                                <div class="w-1/12 h-1/2 bg-green-500 "></div>
                                <div class="w-1/12 h-1/4 bg-green-500 "></div>
                                <div class="w-1/12 h-1/3 bg-green-500 "></div>
                                <div class="w-1/12 h-3/5 bg-green-500 "></div>
                                <div class="w-1/12 h-2/3 bg-green-500 "></div>
                                <div class="w-1/12 h-1/2 bg-green-500 "></div>
                                <div class="w-1/12 h-3/4 bg-green-500 "></div>
                                <div class="w-1/12 h-4/5 bg-green-500 "></div>
                                <div class="w-1/12 h-1/2 bg-green-500 "></div>
                                <div class="w-1/12 h-3/5 bg-green-500 "></div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 flex justify-between px-4 text-xs text-gray-500">
                            <span>1 Aug</span>
                            <span>5 Aug</span>
                            <span>10 Aug</span>
                            <span>15 Aug</span>
                            <span>20 Aug</span>
                            <span>25 Aug</span>
                            <span>30 Aug</span>
                        </div>
                    </div> --}}

                </div>

                <div class="bg-white  shadow-sm p-5">
                    <h3 class="font-semibold text-gray-800 mb-5">Campaign Performance</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Tech Talent Recruitment</span>
                                <span class="font-medium">42,189</span>
                            </div>
                            <div class="progress-bar w-full bg-gray-200 ">
                                <div class="bg-blue-600 h-full " style="width: 65%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-1">
                                <span>Impressions</span>
                                <span>65% of total</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Remote Work Summit</span>
                                <span class="font-medium">28,456</span>
                            </div>
                            <div class="progress-bar w-full bg-gray-200 ">
                                <div class="bg-green-600 h-full " style="width: 45%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-1">
                                <span>Impressions</span>
                                <span>45% of total</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Developer Bootcamp</span>
                                <span class="font-medium">15,342</span>
                            </div>
                            <div class="progress-bar w-full bg-gray-200 ">
                                <div class="bg-purple-600 h-full " style="width: 25%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-1">
                                <span>Impressions</span>
                                <span>25% of total</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">HR Software Solutions</span>
                                <span class="font-medium">9,765</span>
                            </div>
                            <div class="progress-bar w-full bg-gray-200 ">
                                <div class="bg-yellow-600 h-full " style="width: 15%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-1">
                                <span>Impressions</span>
                                <span>15% of total</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campaign Table -->
            <div class="bg-white  shadow-sm p-5">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="font-semibold text-gray-800">Campaign Performance Details</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search campaigns..."
                            class="bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div class="overflow-x-auto custom-scrollbar">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Campaign</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Impressions</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Clicks</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CTR</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Spend</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Conversions</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CPA</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Tech Talent Recruitment</div>
                                    <div class="text-sm text-gray-500">ID: AD-2023-001</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold  bg-green-100 text-green-800">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">42,189</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1,248</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2.96%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,250</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">89</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$14.04</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3"><i
                                            class="fas fa-chart-bar"></i></button>
                                    <button class="text-gray-600 hover:text-gray-900"><i
                                            class="fas fa-ellipsis-v"></i></button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6 mt-4">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of
                                <span class="font-medium">12</span> campaigns
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-blue-50 text-sm font-medium text-blue-600">2</a>
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('adsReportChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Clicks',
                    data: [120, 190, 300, 250],
                    backgroundColor: 'rgba(59, 130, 246, 0.6)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>

</body>