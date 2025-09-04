@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Enhanced Welcome Section -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
        <div class="flex items-center justify-between">
            <div>
                    <h2 class="text-3xl font-black mb-3 text-gray-900 dark:text-white">
                        Welcome back, {{ auth()->user()->name }}! 👋
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Here's what's happening with your store today.
                    </p>
            </div>
            <div class="hidden lg:block">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-2xl">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2zm0 0V5a2 2 0 012-2h2a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="stats-grid">
        <!-- Total Users -->
        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
            <div class="stat-value">{{ number_format($stats['total_users'] ?? 0) }}</div>
            <div class="stat-label">Total Users</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Registered customers</p>
        </div>

        <!-- Total Products -->
        <div class="stat-card reveal-on-scroll reveal-up" style="animation-delay: 0.1s;">
            <div class="stat-icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            <div class="stat-value">{{ number_format($stats['total_products'] ?? 0) }}</div>
            <div class="stat-label">Total Products</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">In catalog</p>
        </div>

        <!-- Total Orders -->
        <div class="stat-card reveal-on-scroll reveal-up" style="animation-delay: 0.2s;">
            <div class="stat-icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            <div class="stat-value">{{ number_format($stats['total_orders'] ?? 0) }}</div>
            <div class="stat-label">Total Orders</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">All time</p>
        </div>

        <!-- Total Revenue -->
        <div class="stat-card reveal-on-scroll reveal-up" style="animation-delay: 0.3s;">
            <div class="stat-icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            <div class="stat-value">${{ number_format($stats['total_revenue'] ?? 0, 2) }}</div>
            <div class="stat-label">Total Revenue</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">All time sales</p>
        </div>
    </div>

    <!-- Enhanced Charts and Additional Stats -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Revenue Chart -->
        <div class="admin-card reveal-on-scroll reveal-left">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Monthly Revenue</h3>
            </div>
            <div class="admin-card-body">
            <div class="flex items-center justify-between mb-6">
                <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Revenue trend</span>
                </div>
                <canvas id="revenueChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Orders Chart -->
        <div class="admin-card reveal-on-scroll reveal-right">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Order Status</h3>
            </div>
            <div class="admin-card-body">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-3 h-3 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full"></div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Order distribution</span>
                </div>
                <canvas id="ordersChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Enhanced Recent Activity -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Activity</h3>
            </div>
        <div class="admin-card-body">
            <div class="space-y-4">
                @forelse($recentActivity ?? [] as $activity)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $activity->description ?? 'Activity description' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $activity->created_at ?? now() }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2zm0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400">No recent activity</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Enhanced Quick Actions -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Quick Actions</h3>
        </div>
        <div class="admin-card-body">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-primary w-full justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Product
                </a>
                
                <a href="{{ route('admin.categories.create') }}" class="admin-btn admin-btn-secondary w-full justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Add Category
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="admin-btn admin-btn-success w-full justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Manage Users
                </a>
                </div>
        </div>
    </div>
</div>

<!-- Enhanced Chart Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [12000, 19000, 15000, 25000, 22000, 30000],
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(102, 126, 234, 0.1)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(102, 126, 234, 0.1)'
                    }
                }
            }
        }
    });

    // Orders Chart
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    new Chart(ordersCtx, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Pending', 'Processing', 'Cancelled'],
            datasets: [{
                data: [65, 15, 15, 5],
                backgroundColor: [
                    '#43e97b',
                    '#fa709a',
                    '#4facfe',
                    '#ff6b6b'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
});
</script>
@endsection
