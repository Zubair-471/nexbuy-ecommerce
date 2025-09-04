@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">#{{ $order->id }}</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-gray-900 dark:text-white">Edit Order</h2>
                        <p class="text-gray-600 dark:text-gray-400">Order #{{ $order->order_number ?? $order->id }}</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <a href="{{ route('admin.orders.show', $order) }}" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Order
                    </a>
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

    <!-- Edit Form -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Order Information</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.orders.update', $order) }}" method="PUT">
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
                        value="{{ $order->user_id }}"
                        required="true"
                        help="Select the customer for this order"
                    />

                    <x-admin-form-field
                        type="text"
                        name="customer_name"
                        label="Customer Name"
                        placeholder="Enter customer name"
                        value="{{ $order->customer_name }}"
                        help="Customer's full name"
                    />

                    <x-admin-form-field
                        type="email"
                        name="customer_email"
                        label="Customer Email"
                        placeholder="customer@example.com"
                        value="{{ $order->customer_email }}"
                        help="Customer's email address"
                    />

                    <x-admin-form-field
                        type="tel"
                        name="customer_phone"
                        label="Customer Phone"
                        placeholder="+1 (555) 123-4567"
                        value="{{ $order->customer_phone }}"
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
                        value="{{ $order->shipping_address }}"
                        help="Complete shipping address"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_city"
                        label="City"
                        placeholder="Enter city"
                        value="{{ $order->shipping_city }}"
                        help="Shipping city"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_state"
                        label="State/Province"
                        placeholder="Enter state or province"
                        value="{{ $order->shipping_state }}"
                        help="Shipping state or province"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_postal_code"
                        label="Postal Code"
                        placeholder="Enter postal code"
                        value="{{ $order->shipping_postal_code }}"
                        help="Shipping postal code"
                    />

                    <x-admin-form-field
                        type="text"
                        name="shipping_country"
                        label="Country"
                        placeholder="Enter country"
                        value="{{ $order->shipping_country }}"
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
                        value="{{ $order->status }}"
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
                        value="{{ $order->payment_status }}"
                        required="true"
                        help="Current payment status"
                    />

                    <x-admin-form-field
                        type="text"
                        name="payment_method"
                        label="Payment Method"
                        placeholder="Credit Card, PayPal, etc."
                        value="{{ $order->payment_method }}"
                        help="Method used for payment"
                    />

                    <x-admin-form-field
                        type="text"
                        name="tracking_number"
                        label="Tracking Number"
                        placeholder="Enter tracking number"
                        value="{{ $order->tracking_number }}"
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
                            value="{{ $order->notes }}"
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
                        Update Order
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- Order Items -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Order Items</h3>
            <button type="button" class="admin-btn admin-btn-primary text-sm" onclick="addOrderItem()">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Item
            </button>
        </div>
        <div class="admin-card-body">
            <div id="order-items-container">
                @if($order->items && $order->items->count() > 0)
                    @foreach($order->items as $index => $item)
                    <div class="order-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4" data-item-index="{{ $index }}">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="admin-form-label">Product</label>
                                <select name="items[{{ $index }}][product_id]" class="admin-form-select" required>
                                    <option value="">Select Product</option>
                                    @foreach($products ?? [] as $product)
                                        <option value="{{ $product->id }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="admin-form-label">Quantity</label>
                                <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" min="1" class="admin-form-input" required>
                            </div>
                            <div>
                                <label class="admin-form-label">Price</label>
                                <input type="number" name="items[{{ $index }}][price]" value="{{ $item->price }}" min="0" step="0.01" class="admin-form-input" required>
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="admin-btn admin-btn-danger text-sm" onclick="removeOrderItem({{ $index }})">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <p>No items in this order</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Order Summary</h3>
        </div>
        <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $order->items_count ?? 0 }}</div>
                    <div class="text-sm text-blue-600 dark:text-blue-400">Total Items</div>
                </div>
                <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-green-600 dark:text-green-400">${{ number_format($order->total_amount ?? 0, 2) }}</div>
                    <div class="text-sm text-green-600 dark:text-green-400">Total Amount</div>
                </div>
                <div class="text-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $order->created_at->format('M d, Y') }}</div>
                    <div class="text-sm text-purple-600 dark:text-purple-400">Order Date</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Get products data from PHP
const productsData = @json($products ?? []);
let itemIndex = {{ $order->items ? $order->items->count() : 0 }};

function addOrderItem() {
    const container = document.getElementById('order-items-container');
    const itemDiv = document.createElement('div');
    itemDiv.className = 'order-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4';
    itemDiv.setAttribute('data-item-index', itemIndex);
    
    // Create product options dynamically
    const productSelect = document.createElement('select');
    productSelect.name = `items[${itemIndex}][product_id]`;
    productSelect.className = 'admin-form-select';
    productSelect.required = true;
    
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Select Product';
    productSelect.appendChild(defaultOption);
    
    // Add product options from the products data
    productsData.forEach(product => {
        const option = document.createElement('option');
        option.value = product.id;
        option.textContent = product.name;
        productSelect.appendChild(option);
    });
    
    itemDiv.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="admin-form-label">Product</label>
                <div id="product-select-${itemIndex}"></div>
            </div>
            <div>
                <label class="admin-form-label">Quantity</label>
                <input type="number" name="items[${itemIndex}][quantity]" value="1" min="1" class="admin-form-input" required>
            </div>
            <div>
                <label class="admin-form-label">Price</label>
                <input type="number" name="items[${itemIndex}][price]" value="0.00" min="0" step="0.01" class="admin-form-input" required>
            </div>
            <div class="flex items-end">
                <button type="button" class="admin-btn admin-btn-danger text-sm" onclick="removeOrderItem(${itemIndex})">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    `;
    
    // Append the product select to the container
    const productContainer = itemDiv.querySelector(`#product-select-${itemIndex}`);
    productContainer.appendChild(productSelect);
    
    container.appendChild(itemDiv);
    itemIndex++;
}

function removeOrderItem(index) {
    const item = document.querySelector(`[data-item-index="${index}"]`);
    if (item) {
        item.remove();
    }
}

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
