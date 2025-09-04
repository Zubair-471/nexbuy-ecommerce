@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Welcome back! Here's what's happening with your store today.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <button class="admin-btn admin-btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Export Report
            </button>
            <button class="admin-btn admin-btn-primary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Product
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="admin-card p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 p-3 rounded-full bg-blue-100 dark:bg-blue-900/30">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Total Orders</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ number_format($stats['total_orders'] ?? 0) }}</p>
                    <div class="flex items-center text-sm">
                        <span class="inline-flex items-center text-green-600 dark:text-green-400">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            +{{ $stats['orders_growth'] ?? 0 }}%
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 p-3 rounded-full bg-green-100 dark:bg-green-900/30">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Revenue</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-2">${{ number_format($stats['total_revenue'] ?? 0, 2) }}</p>
                    <div class="flex items-center text-sm">
                        <span class="inline-flex items-center text-green-600 dark:text-green-400">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            +{{ $stats['revenue_growth'] ?? 0 }}%
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 p-3 rounded-full bg-purple-100 dark:bg-purple-900/30">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Products</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ number_format($stats['total_products'] ?? 0) }}</p>
                    <div class="flex items-center text-sm">
                        <span class="inline-flex items-center text-blue-600 dark:text-blue-400">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $stats['active_products'] ?? 0 }} active
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 p-3 rounded-full bg-yellow-100 dark:bg-yellow-900/30">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Customers</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ number_format($stats['total_users'] ?? 0) }}</p>
                    <div class="flex items-center text-sm">
                        <span class="inline-flex items-center text-green-600 dark:text-green-400">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            +{{ $stats['customers_growth'] ?? 0 }}%
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sales Chart -->
        <div class="lg:col-span-2">
            <div class="admin-card">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sales Overview</h3>
                    <select class="admin-form-select text-sm w-full sm:w-auto">
                        <option value="7">Last 7 days</option>
                        <option value="30" selected>Last 30 days</option>
                        <option value="90">Last 90 days</option>
                        <option value="365">Last year</option>
                    </select>
                </div>
                <div class="p-6">
                    <div class="h-80">
                        <canvas id="salesChart" class="w-full h-full"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="lg:col-span-1">
            <div class="admin-card">
                <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Orders</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View all</a>
                </div>
                <div class="p-6 space-y-4">
                    @forelse($recentOrders ?? [] as $order)
                    <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                Order #{{ $order->order_number }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                ${{ number_format($order->total_amount, 2) }} • {{ $order->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($order->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                @elseif($order->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No orders yet</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Orders will appear here once customers start shopping.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Top Products -->
        <div class="admin-card">
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Top Products</h3>
                <a href="{{ route('admin.products.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View all</a>
            </div>
            <div class="p-6 space-y-4">
                @forelse($topProducts ?? [] as $product)
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        @if($product->featured_image_url)
                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="w-10 h-10 rounded object-cover">
                        @else
                        <div class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $product->name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $product->category->name ?? 'Uncategorized' }}</p>
                    </div>
                    <div class="flex-shrink-0 text-right">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-300">{{ $product->total_sold ?? 0 }} orders</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No products yet</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Add some products to see them here.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="admin-card">
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Activity</h3>
                <button class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View all</button>
            </div>
            <div class="p-6 space-y-4">
                @forelse($recentActivity ?? [] as $activity)
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900 dark:text-white">{{ $activity->description ?? 'Activity description' }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $activity->created_at->diffForHumans() ?? 'Just now' }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No activity yet</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Activity will appear here as you use the system.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sales Chart with better performance
    const salesCtx = document.getElementById('salesChart');
    if (salesCtx) {
        // Use monthly revenue data if available
        const monthlyData = {!! json_encode($monthlyRevenue ?? []) !!};
        const labels = monthlyData && monthlyData.length > 0 ? monthlyData.map(function(item) { return item.month; }) : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const data = monthlyData && monthlyData.length > 0 ? monthlyData.map(function(item) { return item.revenue; }) : [12, 19, 3, 5, 2, 3, 7, 8, 9, 10, 11, 12];
        
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sales',
                    data: data,
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: 'rgb(59, 130, 246)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(156, 163, 175, 0.1)',
                            drawBorder: false
                        },
                        ticks: {
                            color: 'rgb(156, 163, 175)',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'rgb(156, 163, 175)',
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    }
});
</script>
@endpush
@endsection
