@extends('layouts.admin')

@section('title', $user->name)

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <span class="text-3xl font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-gray-900 dark:text-white">{{ $user->name }}</h2>
                        <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                        <div class="flex items-center space-x-2 mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Verified
                                </span>
                            @endif
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                {{ $user->role->name ?? 'No Role' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <a href="{{ route('admin.users.edit', $user) }}" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit User
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="admin-btn admin-btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Users
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- User Statistics -->
    <div class="stats-grid">
        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-blue-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $user->orders_count ?? 0 }}</div>
            <div class="stat-label">Total Orders</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Orders placed</p>
        </div>

        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-green-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $user->reviews_count ?? 0 }}</div>
            <div class="stat-label">Reviews</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Product reviews</p>
        </div>

        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-purple-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $user->created_at->format('M d, Y') }}</div>
            <div class="stat-label">Member Since</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">{{ $user->created_at->diffForHumans() }}</p>
        </div>

        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-yellow-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</div>
            <div class="stat-label">Last Login</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Last activity</p>
        </div>
    </div>

    <!-- User Details -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Basic Information -->
        <div class="admin-card reveal-on-scroll reveal-left">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Basic Information</h3>
            </div>
            <div class="admin-card-body">
                <div class="space-y-4">
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Full Name</span>
                        <span class="text-gray-900 dark:text-white">{{ $user->name }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Email Address</span>
                        <span class="text-gray-900 dark:text-white">{{ $user->email }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Phone Number</span>
                        <span class="text-gray-900 dark:text-white">{{ $user->phone ?: 'Not provided' }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Role</span>
                        <span class="text-gray-900 dark:text-white">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                {{ $user->role->name ?? 'No Role' }}
                            </span>
                        </span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Account Status</span>
                        <span class="text-gray-900 dark:text-white">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Email Verified</span>
                        <span class="text-gray-900 dark:text-white">
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Yes ({{ $user->email_verified_at->format('M d, Y') }})
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    No
                                </span>
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Created</span>
                        <span class="text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="admin-card reveal-on-scroll reveal-right">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Additional Information</h3>
            </div>
            <div class="admin-card-body">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Company</span>
                        <p class="text-gray-900 dark:text-white">
                            {{ $user->company ?: 'Not specified' }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Position</span>
                        <p class="text-gray-900 dark:text-white">
                            {{ $user->position ?: 'Not specified' }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Admin Notes</span>
                        <p class="text-gray-900 dark:text-white">
                            {{ $user->notes ?: 'No notes available' }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Last Updated</span>
                        <p class="text-gray-900 dark:text-white">
                            {{ $user->updated_at->format('M d, Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    @if($user->orders && $user->orders->count() > 0)
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Orders</h3>
            <a href="{{ route('admin.orders.index', ['user' => $user->id]) }}" class="admin-btn admin-btn-primary text-sm">
                View All Orders
            </a>
        </div>
        <div class="admin-card-body">
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->orders->take(5) as $order)
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-sm font-bold text-white">#{{ $order->id }}</span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Order #{{ $order->order_number ?? $order->id }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->items_count ?? 0 }} items</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-gray-900 dark:text-white">{{ $order->created_at->format('M d, Y') }}</span>
                            </td>
                            <td>
                                <span class="font-bold text-gray-900 dark:text-white">${{ number_format($order->total_amount, 2) }}</span>
                            </td>
                            <td>
                                <span class="inline-flex px-2.5 py-0.5 text-xs font-medium rounded-full
                                    @if($order->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200 @endif">
                                    {{ ucfirst($order->status ?? 'unknown') }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="admin-btn admin-btn-primary text-xs px-3 py-1">
                                        View
                                    </a>
                                    <a href="{{ route('admin.orders.edit', $order) }}" class="admin-btn admin-btn-secondary text-xs px-3 py-1">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Recent Reviews -->
    @if($user->reviews && $user->reviews->count() > 0)
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Reviews</h3>
        </div>
        <div class="admin-card-body">
            <div class="space-y-4">
                @foreach($user->reviews->take(3) as $review)
                <div class="flex items-start space-x-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <h4 class="font-medium text-gray-900 dark:text-white">{{ $review->product->name ?? 'Product' }}</h4>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $review->comment }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">{{ $review->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- User Activity Timeline -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Activity</h3>
        </div>
        <div class="admin-card-body">
            <div class="space-y-4">
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900 dark:text-white">User account created</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                @if($user->email_verified_at)
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900 dark:text-white">Email address verified</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $user->email_verified_at->diffForHumans() }}</p>
                    </div>
                </div>
                @endif

                @if($user->last_login_at)
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900 dark:text-white">Last login</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $user->last_login_at->diffForHumans() }}</p>
                    </div>
                </div>
                @endif

                @if($user->updated_at != $user->created_at)
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900 dark:text-white">Profile updated</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $user->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
