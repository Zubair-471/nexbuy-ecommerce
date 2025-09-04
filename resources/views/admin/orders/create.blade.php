@extends('layouts.admin')

@section('title', 'Create Order')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white">Create New Order</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Create a new order manually</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('admin.orders.index') }}" class="admin-btn admin-btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Form -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Order Information</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.orders.store') }}" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Customer Information -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Customer Information</h4>
                    </div>

                    <x-admin-form-field
                        type="select"
                        name="user_id"
                        label="Customer"
                        options="{{ $users ?? [] }}"
                        required="true"
                        help="Select the customer for this order"
                    />

                    <x-admin-form-field
                        type="text"
                        name="customer_name"
                        label="Customer Name"
                        placeholder="Enter customer name"
                        help="Customer's full name"
                    />

                    <x-admin-form-field
                        type="email"
                        name="customer_email"
                        label="Customer Email"
                        placeholder="customer@example.com"
                        help="Customer's email address"
                    />

                    <x-admin-form-field
                        type="tel"
                        name="customer_phone"
                        label="Customer Phone"
                        placeholder="+1 (555) 123-4567"
                        help="Customer's phone number"
                    />

                    <!-- Shipping Information -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 mt-8">Shipping Information</h4>
                    </div>

                    <x-admin-form-field
                        type="text"
                        name="shipping_address"
                        label="Shipping Address"
                        placeholder="Enter shipping address"
                        help="Complete shipping address"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_city"
                        label="City"
                        placeholder="Enter city"
                        help="Shipping city"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_state"
                        label="State/Province"
                        placeholder="Enter state or province"
                        help="Shipping state or province"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_postal_code"
                        label="Postal Code"
                        placeholder="Enter postal code"
                        help="Shipping postal code"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_country"
                        label="Country"
                        placeholder="Enter country"
                        help="Shipping country"
                    />

                    <!-- Order Details -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 mt-8">Order Details</h4>
                    </div>

                    <x-admin-form-field
                        type="select"
                        name="status"
                        label="Order Status"
                        options="[
                            'pending' => 'Pending',
                            'processing' => 'Processing',
                            'shipped' => 'Shipped',
                            'delivered' => 'Delivered',
                            'cancelled' => 'Cancelled'
                        ]"
                        required="true"
                        help="Current order status"
                    />

                    <x-admin-form-field
                        type="select"
                        name="payment_status"
                        label="Payment Status"
                        options="[
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed',
                            'refunded' => 'Refunded'
                        ]"
                        required="true"
                        help="Current payment status"
                    />

                    <x-admin-form-field
                        type="text"
                        name="payment_method"
                        label="Payment Method"
                        placeholder="Credit Card, PayPal, etc."
                        help="Method used for payment"
                    />

                    <x-admin-form-field
                        type="text"
                        name="tracking_number"
                        label="Tracking Number"
                        placeholder="Enter tracking number"
                        help="Shipping tracking number (optional)"
                    />

                    <!-- Notes -->
                    <div class="md:col-span-2">
                        <x-admin-form-field
                            type="textarea"
                            name="notes"
                            label="Order Notes"
                            placeholder="Any special instructions or notes..."
                            rows="4"
                            help="Internal notes about this order"
                        />
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="admin-form-actions">
                    <a href="{{ route('admin.orders.index') }}" class="admin-btn admin-btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Order
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- Help Section -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Order Creation Guidelines</h3>
        </div>
        <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <h4 class="font-semibold text-gray-900 dark:text-white">Best Practices</h4>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Verify customer information before creating</li>
                        <li>• Use accurate shipping addresses</li>
                        <li>• Set appropriate order status</li>
                        <li>• Include tracking information when available</li>
                    </ul>
                </div>
                <div class="space-y-3">
                    <h4 class="font-semibold text-gray-900 dark:text-white">Status Guidelines</h4>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• <strong>Pending:</strong> Order received, awaiting processing</li>
                        <li>• <strong>Processing:</strong> Order being prepared</li>
                        <li>• <strong>Shipped:</strong> Order has been shipped</li>
                        <li>• <strong>Delivered:</strong> Order completed successfully</li>
                        <li>• <strong>Cancelled:</strong> Order cancelled by customer or admin</li>
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
    // Auto-fill customer information when user is selected
    const userSelect = document.getElementById('user_id');
    const customerNameInput = document.getElementById('customer_name');
    const customerEmailInput = document.getElementById('customer_email');
    const customerPhoneInput = document.getElementById('customer_phone');
    
    if (userSelect && userSelect.options.length > 0) {
        // Store user data for auto-fill
        const userData = {};
        Array.from(userSelect.options).forEach(option => {
            if (option.value && option.dataset.user) {
                try {
                    userData[option.value] = JSON.parse(option.dataset.user);
                } catch (e) {
                    // Skip invalid data
                }
            }
        });

        userSelect.addEventListener('change', function() {
            const selectedUser = userData[this.value];
            if (selectedUser) {
                if (customerNameInput) customerNameInput.value = selectedUser.name || '';
                if (customerEmailInput) customerEmailInput.value = selectedUser.email || '';
                if (customerPhoneInput) customerPhoneInput.value = selectedUser.phone || '';
            }
        });
    }
});
</script>
@endpush
