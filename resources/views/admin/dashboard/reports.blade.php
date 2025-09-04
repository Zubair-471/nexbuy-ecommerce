@extends('layouts.admin')

@section('title', 'Reports & Analytics')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reports & Analytics</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Generate detailed reports and analyze your store performance</p>
        </div>
        <div class="flex items-center space-x-3">
            <button class="admin-btn admin-btn-secondary" onclick="exportReport()">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Export Report
            </button>
        </div>
    </div>

    <!-- Report Filters -->
    <div class="admin-card">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Report Filters</h3>
            <button class="admin-btn admin-btn-primary" onclick="generateReport()">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Generate Report
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <label class="admin-form-label">Report Type</label>
                <select id="report-type" class="admin-form-select">
                    <option value="sales">Sales Report</option>
                    <option value="products">Products Report</option>
                    <option value="customers">Customers Report</option>
                    <option value="orders">Orders Report</option>
                    <option value="inventory">Inventory Report</option>
                </select>
            </div>
            <div>
                <label class="admin-form-label">Date Range</label>
                <select id="date-range" class="admin-form-select">
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last7days">Last 7 days</option>
                    <option value="last30days" selected>Last 30 days</option>
                    <option value="last90days">Last 90 days</option>
                    <option value="lastyear">Last year</option>
                    <option value="custom">Custom range</option>
                </select>
            </div>
            <div id="custom-date-start" class="hidden">
                <label class="admin-form-label">Start Date</label>
                <input type="date" id="start-date" class="admin-form-input">
            </div>
            <div id="custom-date-end" class="hidden">
                <label class="admin-form-label">End Date</label>
                <input type="date" id="end-date" class="admin-form-input">
            </div>
        </div>
    </div>

    <!-- Report Content -->
    <div id="report-content" class="space-y-8">
        <!-- Sales Report -->
        <div id="sales-report" class="report-section">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Sales Overview</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center p-6 bg-blue-50 dark:bg-blue-900/10 rounded-lg">
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">${{ number_format($salesData['total_revenue'] ?? 0, 2) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Revenue</p>
                    </div>
                    <div class="text-center p-6 bg-green-50 dark:bg-green-900/10 rounded-lg">
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ number_format($salesData['total_orders'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Orders</p>
                    </div>
                    <div class="text-center p-6 bg-purple-50 dark:bg-purple-900/10 rounded-lg">
                        <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">${{ number_format($salesData['average_order_value'] ?? 0, 2) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Average Order Value</p>
                    </div>
                </div>
                
                <div class="h-80">
                    <canvas id="salesChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- Products Report -->
        <div id="products-report" class="report-section hidden">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Products Performance</h3>
                <div class="overflow-hidden">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Orders</th>
                                <th>Revenue</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($productsData ?? [] as $product)
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        @if($product->featured_image_url)
                                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="w-10 h-10 rounded object-cover mr-3">
                                        @endif
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">{{ $product->name }}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $product->sku ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-gray-900 dark:text-white">{{ $product->category->name ?? 'Uncategorized' }}</td>
                                <td class="text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $product->orders_count ?? 0 }}</td>
                                <td class="text-gray-900 dark:text-white">${{ number_format($product->revenue ?? 0, 2) }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $product->stock_quantity ?? 0 }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 dark:text-gray-400 py-4">No products found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Customers Report -->
        <div id="customers-report" class="report-section hidden">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Customer Analysis</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="text-md font-medium text-gray-900 dark:text-white mb-4">Customer Demographics</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Total Customers:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ number_format($customersData['total_customers'] ?? 0) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">New This Month:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ number_format($customersData['new_customers'] ?? 0) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Repeat Customers:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ number_format($customersData['repeat_customers'] ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-md font-medium text-gray-900 dark:text-white mb-4">Customer Value</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Average Customer Value:</span>
                                <span class="font-medium text-gray-900 dark:text-white">${{ number_format($customersData['avg_customer_value'] ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Top Customer Spent:</span>
                                <span class="font-medium text-gray-900 dark:text-white">${{ number_format($customersData['top_customer_spent'] ?? 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 h-64">
                    <canvas id="customersChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- Orders Report -->
        <div id="orders-report" class="report-section hidden">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Orders Analysis</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/10 rounded-lg">
                        <p class="text-xl font-bold text-blue-600 dark:text-blue-400">{{ number_format($ordersData['total_orders'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Orders</p>
                    </div>
                    <div class="text-center p-4 bg-green-50 dark:bg-green-900/10 rounded-lg">
                        <p class="text-xl font-bold text-green-600 dark:text-green-400">{{ number_format($ordersData['completed_orders'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Completed</p>
                    </div>
                    <div class="text-center p-4 bg-yellow-50 dark:bg-yellow-900/10 rounded-lg">
                        <p class="text-xl font-bold text-yellow-600 dark:text-yellow-400">{{ number_format($ordersData['pending_orders'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Pending</p>
                    </div>
                    <div class="text-center p-4 bg-red-50 dark:bg-red-900/10 rounded-lg">
                        <p class="text-xl font-bold text-red-600 dark:text-red-400">{{ number_format($ordersData['cancelled_orders'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Cancelled</p>
                    </div>
                </div>
                
                <div class="h-64">
                    <canvas id="ordersChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- Inventory Report -->
        <div id="inventory-report" class="report-section hidden">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Inventory Status</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center p-6 bg-green-50 dark:bg-green-900/10 rounded-lg">
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ number_format($inventoryData['in_stock'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">In Stock</p>
                    </div>
                    <div class="text-center p-6 bg-yellow-50 dark:bg-yellow-900/10 rounded-lg">
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ number_format($inventoryData['low_stock'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Low Stock</p>
                    </div>
                    <div class="text-center p-6 bg-red-50 dark:bg-red-900/10 rounded-lg">
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400">{{ number_format($inventoryData['out_of_stock'] ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Out of Stock</p>
                    </div>
                </div>
                
                <div class="overflow-hidden">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Current Stock</th>
                                <th>Min Stock Level</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inventoryData['products'] ?? [] as $product)
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        @if($product->featured_image_url)
                                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="w-10 h-10 rounded object-cover mr-3">
                                        @endif
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">{{ $product->name }}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $product->sku ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-gray-900 dark:text-white">{{ $product->stock_quantity ?? 0 }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $product->min_stock_level ?? 0 }}</td>
                                <td>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($product->stock_quantity > ($product->min_stock_level ?? 0)) bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400
                                        @elseif($product->stock_quantity > 0) bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400
                                        @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400
                                        @endif">
                                        @if($product->stock_quantity > ($product->min_stock_level ?? 0))
                                            In Stock
                                        @elseif($product->stock_quantity > 0)
                                            Low Stock
                                        @else
                                            Out of Stock
                                        @endif
                                    </span>
                                </td>
                                <td class="text-gray-900 dark:text-white">{{ $product->updated_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 dark:text-gray-400 py-4">No inventory data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize charts
    initializeCharts();
    
    // Handle date range changes
    document.getElementById('date-range').addEventListener('change', function() {
        if (this.value === 'custom') {
            document.getElementById('custom-date-start').classList.remove('hidden');
            document.getElementById('custom-date-end').classList.remove('hidden');
        } else {
            document.getElementById('custom-date-start').classList.add('hidden');
            document.getElementById('custom-date-end').classList.add('hidden');
        }
    });
    
    // Handle report type changes
    document.getElementById('report-type').addEventListener('change', function() {
        showReportSection(this.value);
    });
});

function showReportSection(reportType) {
    // Hide all report sections
    document.querySelectorAll('.report-section').forEach(section => {
        section.classList.add('hidden');
    });
    
    // Show selected report section
    const selectedSection = document.getElementById(reportType + '-report');
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
    }
}

function initializeCharts() {
    // Sales Chart
    const salesCtx = document.getElementById('salesChart');
    if (salesCtx) {
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3, 7, 8, 9, 10, 11, 12],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(156, 163, 175, 0.1)' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }
    
    // Customers Chart
    const customersCtx = document.getElementById('customersChart');
    if (customersCtx) {
        new Chart(customersCtx, {
            type: 'doughnut',
            data: {
                labels: ['New', 'Returning', 'Inactive'],
                datasets: [{
                    data: [30, 50, 20],
                    backgroundColor: ['#10B981', '#3B82F6', '#6B7280']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }
    
    // Orders Chart
    const ordersCtx = document.getElementById('ordersChart');
    if (ordersCtx) {
        new Chart(ordersCtx, {
            type: 'bar',
            data: {
                labels: ['Completed', 'Pending', 'Processing', 'Cancelled'],
                datasets: [{
                    label: 'Orders',
                    data: [65, 20, 10, 5],
                    backgroundColor: ['#10B981', '#F59E0B', '#3B82F6', '#EF4444']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(156, 163, 175, 0.1)' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }
}

function generateReport() {
    const reportType = document.getElementById('report-type').value;
    const dateRange = document.getElementById('date-range').value;
    
    // Show loading state
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '<svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Generating...';
    button.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        showReportSection(reportType);
        button.innerHTML = originalText;
        button.disabled = false;
    }, 1000);
}

function exportReport() {
    const reportType = document.getElementById('report-type').value;
    const dateRange = document.getElementById('date-range').value;
    
    // Create download link
    const data = `Report Type: ${reportType}\nDate Range: ${dateRange}\nGenerated: ${new Date().toLocaleString()}`;
    const blob = new Blob([data], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${reportType}-report-${dateRange}.txt`;
    a.click();
    window.URL.revokeObjectURL(url);
}
</script>
@endpush
@endsection
