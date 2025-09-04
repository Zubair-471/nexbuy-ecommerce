@extends('layouts.admin')

@section('title', 'Orders Management')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Orders Management</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Track and manage customer orders, payments, and shipping.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <button class="admin-btn admin-btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
                Filter
            </button>
            <button class="admin-btn admin-btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Export
            </button>
        </div>
    </div>

    <!-- Order Statistics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-blue-100 dark:bg-blue-900/30">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Orders</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $orders->total() ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-yellow-100 dark:bg-yellow-900/30">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Pending</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $orders->where('status', 'pending')->count() ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-green-100 dark:bg-green-900/30">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Completed</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $orders->where('status', 'completed')->count() ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Cancelled</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $orders->where('status', 'cancelled')->count() ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="admin-card p-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="admin-form-group">
                <label class="admin-form-label">Search Orders</label>
                <input type="text" placeholder="Order #, customer..." class="admin-form-input">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Status</label>
                <select class="admin-form-select">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Date Range</label>
                <select class="admin-form-select">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="quarter">This Quarter</option>
                    <option value="year">This Year</option>
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Payment Status</label>
                <select class="admin-form-select">
                    <option value="">All Payments</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                    <option value="refunded">Refunded</option>
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Amount Range</label>
                <select class="admin-form-select">
                    <option value="">All Amounts</option>
                    <option value="0-50">$0 - $50</option>
                    <option value="50-100">$50 - $100</option>
                    <option value="100-200">$100 - $200</option>
                    <option value="200+">$200+</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="admin-card">
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Orders ({{ $orders->total() ?? 0 }})</h3>
            <div class="flex items-center space-x-2">
                <button class="admin-btn admin-btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export CSV
                </button>
                <button class="admin-btn admin-btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export PDF
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders ?? [] as $order)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    </div>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">#{{ $order->order_number }}</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">{{ $order->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white">{{ $order->user->name ?? 'Guest' }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">{{ $order->user->email ?? 'No email' }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $order->items->count() ?? 0 }} items
                                    </div>
                        </td>
                        <td>
                            <div class="text-sm">
                                <span class="font-medium text-gray-900 dark:text-white">${{ number_format($order->total_amount, 2) }}</span>
                                </div>
                            </td>
                        <td>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($order->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                                @elseif($order->status === 'shipped') bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400
                                @elseif($order->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        <td>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($order->payment_status === 'paid') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                @elseif($order->payment_status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                @elseif($order->payment_status === 'failed') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @endif">
                                {{ ucfirst($order->payment_status ?? 'pending') }}
                            </span>
                            </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $order->created_at->format('M d, Y') }}
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-300">
                                {{ $order->created_at->format('h:i A') }}
                            </div>
                            </td>
                        <td>
                                <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.orders.edit', $order) }}" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                        <td colspan="8" class="text-center py-12">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No orders found</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Orders will appear here once customers start shopping.</p>
                            </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(isset($orders) && $orders->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
