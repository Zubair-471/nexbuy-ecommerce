@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-gray-900 dark:text-white">Edit User</h2>
                        <p class="text-gray-600 dark:text-gray-400">{{ $user->name }} ({{ $user->email }})</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <a href="{{ route('admin.users.show', $user) }}" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View User
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

    <!-- Edit Form -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">User Information</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.users.update', $user) }}" method="PUT">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h4>
                    </div>

                    <x-admin-form-field
                        type="text"
                        name="name"
                        label="Full Name"
                        placeholder="Enter full name"
                        value="{{ $user->name }}"
                        required="true"
                        help="User's full name as it will appear in the system"
                    />

                    <x-admin-form-field
                        type="email"
                        name="email"
                        label="Email Address"
                        placeholder="user@example.com"
                        value="{{ $user->email }}"
                        required="true"
                        help="Unique email address for login and communication"
                    />

                    <x-admin-form-field
                        type="tel"
                        name="phone"
                        label="Phone Number"
                        placeholder="+1 (555) 123-4567"
                        value="{{ $user->phone }}"
                        help="Optional phone number for contact purposes"
                    />

                    <x-admin-form-field
                        type="select"
                        name="role_id"
                        label="User Role"
                        options="{{ $roles ?? [] }}"
                        value="{{ $user->role_id }}"
                        required="true"
                        help="Role determines user permissions and access level"
                    />

                    <!-- Account Settings -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 mt-8">Account Settings</h4>
                    </div>

                    <x-admin-form-field
                        type="checkbox"
                        name="email_verified"
                        label="Email Verified"
                        value="{{ $user->email_verified_at ? 1 : 0 }}"
                        help="Mark if user's email has been verified"
                    />

                    <x-admin-form-field
                        type="checkbox"
                        name="is_active"
                        label="Account Active"
                        value="{{ $user->is_active ?? 1 }}"
                        help="Enable or disable user account"
                    />

                    <!-- Additional Information -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 mt-8">Additional Information</h4>
                    </div>

                    <x-admin-form-field
                        type="text"
                        name="company"
                        label="Company"
                        placeholder="Company name (optional)"
                        value="{{ $user->company }}"
                        help="User's company or organization"
                    />

                    <x-admin-form-field
                        type="text"
                        name="position"
                        label="Position"
                        placeholder="Job title (optional)"
                        value="{{ $user->position }}"
                        help="User's job title or position"
                    />

                    <x-admin-form-field
                        type="textarea"
                        name="notes"
                        label="Admin Notes"
                        placeholder="Internal notes about this user..."
                        rows="3"
                        value="{{ $user->notes }}"
                        help="Private notes for administrators only"
                    />
                </div>

                <!-- Form Actions -->
                <div class="admin-form-actions">
                    <a href="{{ route('admin.users.index') }}" class="admin-btn admin-btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update User
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- Change Password -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Change Password</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.users.update', $user) }}" method="PUT">
                <input type="hidden" name="update_password" value="1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-admin-form-field
                        type="password"
                        name="new_password"
                        label="New Password"
                        placeholder="Enter new password"
                        help="Leave blank to keep current password"
                    />

                    <x-admin-form-field
                        type="password"
                        name="new_password_confirmation"
                        label="Confirm New Password"
                        placeholder="Confirm new password"
                        help="Must match the new password above"
                    />
                </div>

                <div class="admin-form-actions">
                    <button type="submit" class="admin-btn admin-btn-warning">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Change Password
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- User Statistics -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">User Statistics</h3>
        </div>
        <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $user->orders_count ?? 0 }}</div>
                    <div class="text-sm text-blue-600 dark:text-blue-400">Total Orders</div>
                </div>
                <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $user->reviews_count ?? 0 }}</div>
                    <div class="text-sm text-green-600 dark:text-green-400">Reviews</div>
                </div>
                <div class="text-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $user->created_at->diffForHumans() }}</div>
                    <div class="text-sm text-purple-600 dark:text-purple-400">Member Since</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="admin-card reveal-on-scroll reveal-up border-red-200 dark:border-red-800">
        <div class="admin-card-header">
            <h3 class="admin-card-title text-red-600 dark:text-red-400">Danger Zone</h3>
        </div>
        <div class="admin-card-body">
            <div class="space-y-4">
                <!-- Toggle Status -->
                <div class="flex items-center justify-between p-4 bg-red-50 dark:bg-red-900/20 rounded-xl">
                    <div>
                        <h4 class="font-semibold text-red-800 dark:text-red-200">Account Status</h4>
                        <p class="text-sm text-red-600 dark:text-red-400 mt-1">
                            @if($user->is_active)
                                Currently active. Deactivating will prevent user login.
                            @else
                                Currently inactive. Activating will allow user login.
                            @endif
                        </p>
                    </div>
                    <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="admin-btn {{ $user->is_active ? 'admin-btn-danger' : 'admin-btn-success' }}">
                            @if($user->is_active)
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L5.636 5.636"></path>
                                </svg>
                                Deactivate
                            @else
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Activate
                            @endif
                        </button>
                    </form>
                </div>

                <!-- Delete User -->
                <div class="flex items-center justify-between p-4 bg-red-50 dark:bg-red-900/20 rounded-xl">
                    <div>
                        <h4 class="font-semibold text-red-800 dark:text-red-200">Delete User</h4>
                        <p class="text-sm text-red-600 dark:text-red-400 mt-1">
                            This action cannot be undone. All user data will be permanently deleted.
                        </p>
                    </div>
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-btn admin-btn-danger">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password strength indicator for new password
    const newPasswordInput = document.getElementById('new_password');
    const confirmNewPasswordInput = document.getElementById('new_password_confirmation');
    
    if (newPasswordInput) {
        const strengthIndicator = document.createElement('div');
        strengthIndicator.className = 'text-xs mt-1';
        newPasswordInput.parentNode.appendChild(strengthIndicator);

        newPasswordInput.addEventListener('input', function() {
            if (this.value === '') {
                strengthIndicator.textContent = '';
                return;
            }

            const password = this.value;
            let strength = 0;
            let message = '';
            let color = '';

            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            switch(strength) {
                case 0:
                case 1:
                    message = 'Very Weak';
                    color = 'text-red-500';
                    break;
                case 2:
                    message = 'Weak';
                    color = 'text-orange-500';
                    break;
                case 3:
                    message = 'Fair';
                    color = 'text-yellow-500';
                    break;
                case 4:
                    message = 'Good';
                    color = 'text-blue-500';
                    break;
                case 5:
                    message = 'Strong';
                    color = 'text-green-500';
                    break;
            }

            strengthIndicator.textContent = `Password Strength: ${message}`;
            strengthIndicator.className = `text-xs mt-1 ${color}`;
        });
    }

    // Password confirmation check
    if (newPasswordInput && confirmNewPasswordInput) {
        const matchIndicator = document.createElement('div');
        matchIndicator.className = 'text-xs mt-1';
        confirmNewPasswordInput.parentNode.appendChild(matchIndicator);

        function checkMatch() {
            if (confirmNewPasswordInput.value === '') {
                matchIndicator.textContent = '';
                return;
            }
            
            if (newPasswordInput.value === confirmNewPasswordInput.value) {
                matchIndicator.textContent = 'Passwords match';
                matchIndicator.className = 'text-xs mt-1 text-green-500';
            } else {
                matchIndicator.textContent = 'Passwords do not match';
                matchIndicator.className = 'text-xs mt-1 text-red-500';
            }
        }

        newPasswordInput.addEventListener('input', checkMatch);
        confirmNewPasswordInput.addEventListener('input', checkMatch);
    }
});
</script>
@endpush
