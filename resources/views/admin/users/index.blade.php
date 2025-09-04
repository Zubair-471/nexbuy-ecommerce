@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Users Management</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Manage user accounts, roles, and permissions.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <button class="admin-btn admin-btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
                Filter
            </button>
            <a href="{{ route('admin.users.create') }}" class="admin-btn admin-btn-primary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add User
            </a>
        </div>
    </div>

    <!-- User Statistics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-blue-100 dark:bg-blue-900/30">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Users</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $users->total() ?? 0 }}</p>
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
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Active Users</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $users->where('status', 'active')->count() ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-purple-100 dark:bg-purple-900/30">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Admins</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $users->where('role.name', 'admin')->count() ?? 0 }}</p>
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
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">New This Month</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $users->where('created_at', '>=', now()->startOfMonth())->count() ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="admin-card p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="admin-form-group">
                <label class="admin-form-label">Search Users</label>
                <input type="text" placeholder="Name, email..." class="admin-form-input">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Role</label>
                <select class="admin-form-select">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Status</label>
                <select class="admin-form-select">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="suspended">Suspended</option>
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
        </div>
    </div>

    <!-- Users Table -->
    <div class="admin-card">
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Users ({{ $users->total() ?? 0 }})</h3>
            <div class="flex items-center space-x-2">
                <button class="admin-btn admin-btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                </button>
                <button class="admin-btn admin-btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Bulk Actions
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th class="w-16">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        </th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Orders</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users ?? [] as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="text-center">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white text-sm font-medium">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">{{ $user->email }}</div>
                                        @if($user->phone)
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $user->phone }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        <td>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($user->role && $user->role->name === 'admin') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                @elseif($user->role && $user->role->name === 'staff') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                                @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @endif">
                                {{ $user->role->name ?? 'Customer' }}
                                    </span>
                            </td>
                        <td>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($user->status === 'active') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                @elseif($user->status === 'inactive') bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @elseif($user->status === 'suspended') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @endif">
                                {{ ucfirst($user->status ?? 'active') }}
                                </span>
                            </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $user->orders->count() ?? 0 }} orders
                            </div>
                            @if($user->orders->count() > 0)
                                <div class="text-xs text-gray-600 dark:text-gray-300">
                                    ${{ number_format($user->orders->sum('total_amount'), 2) }} spent
                                </div>
                            @endif
                            </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $user->created_at->format('M d, Y') }}
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-300">
                                {{ $user->created_at->diffForHumans() }}
                            </div>
                            </td>
                        <td>
                                <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-800 dark:hover:text-yellow-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                        </button>
                                @if($user->id !== auth()->id())
                                <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                            </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                        <td colspan="7" class="text-center py-12">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No users found</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Get started by creating your first user account.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.users.create') }}" class="admin-btn admin-btn-primary">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add User
                                    </a>
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(isset($users) && $users->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
