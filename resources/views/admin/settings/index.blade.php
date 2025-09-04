@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Settings</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your store configuration and preferences</p>
        </div>
    </div>

    <!-- Settings Navigation -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex space-x-8 px-6" aria-label="Settings tabs">
                <button class="border-b-2 border-blue-500 py-4 px-1 text-sm font-medium text-blue-600 dark:text-blue-400" id="general-tab">
                    General
                </button>
                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" id="email-tab">
                    Email
                </button>
                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" id="payment-tab">
                    Payment
                </button>
                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" id="shipping-tab">
                    Shipping
                </button>
                <button class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" id="seo-tab">
                    SEO
                </button>
            </nav>
        </div>

        <!-- General Settings -->
        <div id="general-settings" class="p-6">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Store Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="admin-form-label">Store Name</label>
                                <input type="text" name="store_name" value="{{ old('store_name', $settings['store_name'] ?? 'NexBuy') }}" class="admin-form-input" required>
                            </div>
                            <div>
                                <label class="admin-form-label">Store Tagline</label>
                                <input type="text" name="store_tagline" value="{{ old('store_tagline', $settings['store_tagline'] ?? 'Your Ultimate Shopping Destination') }}" class="admin-form-input">
                            </div>
                            <div>
                                <label class="admin-form-label">Store Email</label>
                                <input type="email" name="store_email" value="{{ old('store_email', $settings['store_email'] ?? 'info@nexbuy.com') }}" class="admin-form-input" required>
                            </div>
                            <div>
                                <label class="admin-form-label">Store Phone</label>
                                <input type="text" name="store_phone" value="{{ old('store_phone', $settings['store_phone'] ?? '+1 (555) 123-4567') }}" class="admin-form-input">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Store Address</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="admin-form-label">Address</label>
                                <input type="text" name="store_address" value="{{ old('store_address', $settings['store_address'] ?? '123 Commerce St') }}" class="admin-form-input">
                            </div>
                            <div>
                                <label class="admin-form-label">City</label>
                                <input type="text" name="store_city" value="{{ old('store_city', $settings['store_city'] ?? 'Business City') }}" class="admin-form-input">
                            </div>
                            <div>
                                <label class="admin-form-label">State</label>
                                <input type="text" name="store_state" value="{{ old('store_state', $settings['store_state'] ?? 'BC') }}" class="admin-form-input">
                            </div>
                            <div>
                                <label class="admin-form-label">ZIP Code</label>
                                <input type="text" name="store_zip" value="{{ old('store_zip', $settings['store_zip'] ?? '12345') }}" class="admin-form-input">
                            </div>
                            <div>
                                <label class="admin-form-label">Country</label>
                                <input type="text" name="store_country" value="{{ old('store_country', $settings['store_country'] ?? 'United States') }}" class="admin-form-input">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Store Logo</h3>
                        <div class="flex items-center space-x-6">
                            @if(isset($settings['store_logo']) && $settings['store_logo'])
                            <div class="w-24 h-24 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <img src="{{ asset('storage/' . $settings['store_logo']) }}" alt="Store Logo" class="w-full h-full object-cover">
                            </div>
                            @endif
                            <div>
                                <label class="admin-form-label">Upload New Logo</label>
                                <input type="file" name="store_logo" accept="image/*" class="admin-form-input">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Recommended size: 200x200px, Max: 2MB</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Business Hours</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="admin-form-label">Opening Time</label>
                                <input type="time" name="store_open_time" value="{{ old('store_open_time', $settings['store_open_time'] ?? '09:00') }}" class="admin-form-input">
                            </div>
                            <div>
                                <label class="admin-form-label">Closing Time</label>
                                <input type="time" name="store_close_time" value="{{ old('store_close_time', $settings['store_close_time'] ?? '18:00') }}" class="admin-form-input">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Currency & Language</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="admin-form-label">Default Currency</label>
                                <select name="default_currency" class="admin-form-select">
                                    <option value="USD" {{ (old('default_currency', $settings['default_currency'] ?? 'USD') == 'USD') ? 'selected' : '' }}>USD - US Dollar</option>
                                    <option value="EUR" {{ (old('default_currency', $settings['default_currency'] ?? 'USD') == 'EUR') ? 'selected' : '' }}>EUR - Euro</option>
                                    <option value="GBP" {{ (old('default_currency', $settings['default_currency'] ?? 'USD') == 'GBP') ? 'selected' : '' }}>GBP - British Pound</option>
                                    <option value="CAD" {{ (old('default_currency', $settings['default_currency'] ?? 'USD') == 'CAD') ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                                </select>
                            </div>
                            <div>
                                <label class="admin-form-label">Default Language</label>
                                <select name="default_language" class="admin-form-select">
                                    <option value="en" {{ (old('default_language', $settings['default_language'] ?? 'en') == 'en') ? 'selected' : '' }}>English</option>
                                    <option value="es" {{ (old('default_language', $settings['default_language'] ?? 'en') == 'es') ? 'selected' : '' }}>Spanish</option>
                                    <option value="fr" {{ (old('default_language', $settings['default_language'] ?? 'en') == 'fr') ? 'selected' : '' }}>French</option>
                                    <option value="de" {{ (old('default_language', $settings['default_language'] ?? 'en') == 'de') ? 'selected' : '' }}>German</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="button" class="admin-btn admin-btn-secondary">Cancel</button>
                        <button type="submit" class="admin-btn admin-btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Email Settings -->
        <div id="email-settings" class="p-6 hidden">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Email Settings</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Configure email templates and SMTP settings.</p>
                <div class="mt-6">
                    <button type="button" class="admin-btn admin-btn-primary">Configure Email</button>
                </div>
            </div>
        </div>

        <!-- Payment Settings -->
        <div id="payment-settings" class="p-6 hidden">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Payment Settings</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Configure payment gateways and methods.</p>
                <div class="mt-6">
                    <button type="button" class="admin-btn admin-btn-primary">Configure Payments</button>
                </div>
            </div>
        </div>

        <!-- Shipping Settings -->
        <div id="shipping-settings" class="p-6 hidden">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Shipping Settings</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Configure shipping zones and rates.</p>
                <div class="mt-6">
                    <button type="button" class="admin-btn admin-btn-primary">Configure Shipping</button>
                </div>
            </div>
        </div>

        <!-- SEO Settings -->
        <div id="seo-settings" class="p-6 hidden">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">SEO Settings</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Configure meta tags and SEO optimization.</p>
                <div class="mt-6">
                    <button type="button" class="admin-btn admin-btn-primary">Configure SEO</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('[id$="-tab"]');
    const contents = document.querySelectorAll('[id$="-settings"]');

    function showTab(tabId) {
        // Hide all contents
        contents.forEach(content => content.classList.add('hidden'));
        
        // Remove active state from all tabs
        tabs.forEach(tab => {
            tab.classList.remove('border-blue-500', 'text-blue-600', 'dark:text-blue-400');
            tab.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
        });

        // Show selected content
        const content = document.getElementById(tabId.replace('-tab', '-settings'));
        if (content) content.classList.remove('hidden');

        // Activate selected tab
        const tab = document.getElementById(tabId);
        if (tab) {
            tab.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');
            tab.classList.add('border-blue-500', 'text-blue-600', 'dark:text-blue-400');
        }
    }

    // Add click event to tabs
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            showTab(this.id);
        });
    });

    // Show general tab by default
    showTab('general-tab');
});
</script>
@endpush
@endsection
