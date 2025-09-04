@props([
    'headers' => [],
    'class' => '',
    'responsive' => true,
    'striped' => true,
    'hover' => true
])

<div class="admin-table-container {{ $class }}">
    @if($responsive)
        <div class="overflow-x-auto">
    @endif
    
    <table class="admin-table {{ $striped ? 'striped' : '' }} {{ $hover ? 'hover' : '' }}">
        @if(!empty($headers))
            <thead>
                <tr>
                    @foreach($headers as $header)
                        @if(is_array($header))
                            <th class="admin-table-header {{ $header['class'] ?? '' }}">
                                {{ $header['label'] ?? $header }}
                            </th>
                        @else
                            <th class="admin-table-header">
                                {{ $header }}
                            </th>
                        @endif
                    @endforeach
                </tr>
            </thead>
        @endif
        
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
    
    @if($responsive)
        </div>
    @endif
</div>

@push('styles')
<style>
.admin-table-container {
    @apply bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden;
}

.admin-table {
    @apply w-full border-collapse;
}

.admin-table thead {
    @apply bg-gray-50 dark:bg-gray-700;
}

.admin-table-header {
    @apply px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider border-b border-gray-200 dark:border-gray-600;
}

.admin-table tbody tr {
    @apply border-b border-gray-100 dark:border-gray-700 transition-all duration-200;
}

.admin-table tbody tr:last-child {
    @apply border-b-0;
}

.admin-table.striped tbody tr:nth-child(even) {
    @apply bg-gray-50 dark:bg-gray-800/50;
}

.admin-table.hover tbody tr:hover {
    @apply bg-blue-50 dark:bg-blue-900/20 transform scale-[1.01] shadow-sm;
}

.admin-table tbody td {
    @apply px-6 py-4 text-sm text-gray-900 dark:text-gray-100;
}

.admin-table tbody td:first-child {
    @apply font-medium;
}

.admin-table .admin-table-actions {
    @apply flex items-center space-x-2;
}

.admin-table .admin-table-status {
    @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium;
}

.admin-table .admin-table-status-success {
    @apply bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200;
}

.admin-table .admin-table-status-warning {
    @apply bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200;
}

.admin-table .admin-table-status-danger {
    @apply bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200;
}

.admin-table .admin-table-status-info {
    @apply bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200;
}

.admin-table .admin-table-badge {
    @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200;
}

.admin-table .admin-table-image {
    @apply w-12 h-12 rounded-lg object-cover bg-gray-200 dark:bg-gray-700;
}

.admin-table .admin-table-avatar {
    @apply w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm;
}

.admin-table .admin-table-empty {
    @apply text-center py-12;
}

.admin-table .admin-table-empty-icon {
    @apply mx-auto h-12 w-12 text-gray-400;
}

.admin-table .admin-table-empty-text {
    @apply mt-2 text-sm font-medium text-gray-900 dark:text-gray-100;
}

.admin-table .admin-table-empty-description {
    @apply mt-1 text-sm text-gray-500 dark:text-gray-400;
}

.admin-table .admin-table-loading {
    @apply text-center py-8;
}

.admin-table .admin-table-loading-spinner {
    @apply inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-blue-500 hover:bg-blue-400 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150;
}

.admin-table .admin-table-loading-spinner:disabled {
    @apply opacity-75 cursor-not-allowed;
}

.admin-table .admin-table-loading-spinner svg {
    @apply animate-spin -ml-1 mr-3 h-5 w-5 text-white;
}
</style>
@endpush
