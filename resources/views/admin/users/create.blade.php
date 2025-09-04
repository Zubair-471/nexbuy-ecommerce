@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white">Create New User</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Add a new user to your system</p>
                </div>
                <div class="mt-4 sm:mt-0">
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

    <!-- Create Form -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">User Information</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.users.store') }}" method="POST">
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
                        required="true"
                        help="User's full name as it will appear in the system"
                    />

                    <x-admin-form-field
                        type="email"
                        name="email"
                        label="Email Address"
                        placeholder="user@example.com"
                        required="true"
                        help="Unique email address for login and communication"
                    />

                    <x-admin-form-field
                        type="password"
                        name="password"
                        label="Password"
                        placeholder="Enter password"
                        required="true"
                        help="Minimum 8 characters, include uppercase, lowercase, and numbers"
                    />

                    <x-admin-form-field
                        type="password"
                        name="password_confirmation"
                        label="Confirm Password"
                        placeholder="Confirm password"
                        required="true"
                        help="Must match the password above"
                    />

                    <x-admin-form-field
                        type="tel"
                        name="phone"
                        label="Phone Number"
                        placeholder="+1 (555) 123-4567"
                        help="Optional phone number for contact purposes"
                    />

                    <x-admin-form-field
                        type="select"
                        name="role_id"
                        label="User Role"
                        options="{{ $roles ?? [] }}"
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
                        help="Mark if user's email has been verified"
                    />

                    <x-admin-form-field
                        type="checkbox"
                        name="is_active"
                        label="Account Active"
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
                        help="User's company or organization"
                    />

                    <x-admin-form-field
                        type="text"
                        name="position"
                        label="Position"
                        placeholder="Job title (optional)"
                        help="User's job title or position"
                    />

                    <x-admin-form-field
                        type="textarea"
                        name="notes"
                        label="Admin Notes"
                        placeholder="Internal notes about this user..."
                        rows="3"
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
                        Create User
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- Help Section -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">User Creation Guidelines</h3>
        </div>
        <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <h4 class="font-semibold text-gray-900 dark:text-white">Security Best Practices</h4>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Use strong, unique passwords</li>
                        <li>• Verify email addresses when possible</li>
                        <li>• Assign appropriate role permissions</li>
                        <li>• Review user access regularly</li>
                    </ul>
                </div>
                <div class="space-y-3">
                    <h4 class="font-semibold text-gray-900 dark:text-white">Role Guidelines</h4>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• <strong>Admin:</strong> Full system access</li>
                        <li>• <strong>Staff:</strong> Limited admin access</li>
                        <li>• <strong>Customer:</strong> Basic user access</li>
                        <li>• <strong>Guest:</strong> Read-only access</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    
    if (passwordInput) {
        const strengthIndicator = document.createElement('div');
        strengthIndicator.className = 'text-xs mt-1';
        passwordInput.parentNode.appendChild(strengthIndicator);

        passwordInput.addEventListener('input', function() {
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
    if (passwordInput && confirmPasswordInput) {
        const matchIndicator = document.createElement('div');
        matchIndicator.className = 'text-xs mt-1';
        confirmPasswordInput.parentNode.appendChild(matchIndicator);

        function checkMatch() {
            if (confirmPasswordInput.value === '') {
                matchIndicator.textContent = '';
                return;
            }
            
            if (passwordInput.value === confirmPasswordInput.value) {
                matchIndicator.textContent = 'Passwords match';
                matchIndicator.className = 'text-xs mt-1 text-green-500';
            } else {
                matchIndicator.textContent = 'Passwords do not match';
                matchIndicator.className = 'text-xs mt-1 text-red-500';
            }
        }

        passwordInput.addEventListener('input', checkMatch);
        confirmPasswordInput.addEventListener('input', checkMatch);
    }
});
</script>
@endpush
