@props([
    'action' => '',
    'method' => 'POST',
    'enctype' => 'multipart/form-data',
    'class' => ''
])

<form 
    action="{{ $action }}" 
    method="{{ $method === 'GET' ? 'GET' : 'POST' }}" 
    enctype="{{ $enctype }}"
    class="admin-form {{ $class }}"
>
    @if($method !== 'GET')
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif
    @endif

    {{ $slot }}
</form>

@push('styles')
<style>
.admin-form {
    @apply space-y-6;
}

.admin-form .admin-form-group {
    @apply space-y-2;
}

.admin-form .admin-form-label {
    @apply block text-sm font-semibold text-gray-700 dark:text-gray-300;
}

.admin-form .admin-form-input {
    @apply w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl 
           bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 
           placeholder-gray-500 dark:placeholder-gray-400
           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
           transition-all duration-300;
}

.admin-form .admin-form-input:focus {
    @apply transform -translate-y-1 shadow-lg;
}

.admin-form .admin-form-textarea {
    @apply min-h-32 resize-vertical;
}

.admin-form .admin-form-select {
    @apply cursor-pointer;
}

.admin-form .admin-form-checkbox {
    @apply w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded 
           focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 
           focus:ring-2 dark:bg-gray-700 dark:border-gray-600;
}

.admin-form .admin-form-radio {
    @apply w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 
           focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 
           focus:ring-2 dark:bg-gray-700 dark:border-gray-600;
}

.admin-form .admin-form-error {
    @apply text-sm text-red-600 dark:text-red-400 mt-1;
}

.admin-form .admin-form-help {
    @apply text-sm text-gray-500 dark:text-gray-400 mt-1;
}

.admin-form .admin-form-actions {
    @apply flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700;
}

.admin-form .admin-form-actions-left {
    @apply flex items-center space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700;
}

.admin-form .admin-form-actions-center {
    @apply flex items-center justify-center space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700;
}

.admin-form .admin-form-actions-between {
    @apply flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700;
}
</style>
@endpush
