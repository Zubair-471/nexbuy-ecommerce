<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'NexBuy Admin - Manage your online marketplace')">
    <meta name="keywords" content="@yield('meta_keywords', 'admin, dashboard, ecommerce, management')">
    <meta name="author" content="NexBuy">

    <title>{{ config('app.name', 'NexBuy') }} Admin - @yield('title', 'Dashboard')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js - Loaded once for better performance -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.js"></script>

    <!-- Enhanced Admin Styles -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        body { 
            font-family: 'Inter', sans-serif; 
            scroll-behavior: smooth;
        }

        /* Loading states */
        body.loading {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        body.loaded {
            opacity: 1;
        }

        /* Enhanced Admin Layout */
        .admin-layout {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark .admin-layout {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        /* Enhanced Sidebar */
        .admin-sidebar {
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            box-shadow: var(--shadow-2xl);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-sidebar-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .admin-logo {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-logo:hover {
            transform: scale(1.05) rotate(2deg);
        }

        /* Enhanced Sidebar Navigation */
        .sidebar-nav {
            padding: 1rem 0;
        }

        .sidebar-item {
            margin: 0.25rem 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .sidebar-link:hover::before {
            left: 100%;
        }

        .sidebar-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(8px);
            box-shadow: var(--shadow-lg);
        }

        .sidebar-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-xl);
            transform: translateX(8px);
        }

        .sidebar-link.active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: white;
            border-radius: 2px 0 0 2px;
        }

        .sidebar-icon {
            width: 1.5rem;
            height: 1.5rem;
            margin-right: 0.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link:hover .sidebar-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Enhanced Main Content */
        .admin-main {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Enhanced Header */
        .admin-header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark .admin-header {
            background: rgba(30, 41, 59, 0.9);
            border-bottom: 1px solid rgba(102, 126, 234, 0.2);
        }

        .admin-header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
        }

        .page-title {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.875rem;
            font-weight: 900;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-title:hover {
            transform: scale(1.05);
        }

        .admin-user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-user-avatar {
            width: 3rem;
            height: 3rem;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .admin-user-avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: var(--shadow-xl);
        }

        /* Enhanced Content Area */
        .admin-content {
            padding: 2rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Enhanced Cards */
        .admin-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 1.5rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }

        .admin-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .admin-card:hover::before {
            opacity: 1;
        }

        .admin-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .dark .admin-card {
            background: rgba(30, 41, 59, 0.9);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .admin-card-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            background: rgba(102, 126, 234, 0.05);
        }

        .admin-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .dark .admin-card-title {
            color: #f1f5f9;
        }

        .admin-card-body {
            padding: 1.5rem;
        }

        /* Enhanced Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .dark .stat-card {
            background: rgba(30, 41, 59, 0.9);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .stat-icon {
            width: 3rem;
            height: 3rem;
            background: var(--primary-gradient);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 900;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .dark .stat-value {
            color: #f1f5f9;
        }

        .stat-label {
            color: #64748b;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .dark .stat-label {
            color: #94a3b8;
        }

        /* Enhanced Tables */
        .admin-table-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 1.5rem;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-table-container:hover {
            box-shadow: var(--shadow-xl);
        }

        .dark .admin-table-container {
            background: rgba(30, 41, 59, 0.9);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th {
            background: rgba(102, 126, 234, 0.1);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        }

        .dark .admin-table th {
            color: #f1f5f9;
            background: rgba(102, 126, 234, 0.2);
        }

        .admin-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(102, 126, 234, 0.05);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-table tbody tr:hover td {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        .dark .admin-table tbody tr:hover td {
            background: rgba(102, 126, 234, 0.1);
        }

        /* Enhanced Buttons */
        .admin-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .admin-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .admin-btn:hover::before {
            left: 100%;
        }

        .admin-btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .admin-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .admin-btn-secondary {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .admin-btn-secondary:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .admin-btn-success {
            background: var(--success-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .admin-btn-success:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .admin-btn-warning {
            background: var(--warning-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .admin-btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .admin-btn-danger {
            background: var(--danger-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .admin-btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        /* Enhanced Forms */
        .admin-form-group {
            margin-bottom: 1.5rem;
        }

        .admin-form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1e293b;
        }

        .dark .admin-form-label {
            color: #f1f5f9;
        }

        .admin-form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.9);
            color: #1e293b;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .admin-form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .dark .admin-form-input {
            background: rgba(30, 41, 59, 0.9);
            color: #f1f5f9;
            border-color: rgba(102, 126, 234, 0.3);
        }

        .admin-form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .admin-form-select {
            cursor: pointer;
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.9);
            color: #1e293b;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .admin-form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .dark .admin-form-select {
            background: rgba(30, 41, 59, 0.9);
            color: #f1f5f9;
            border-color: rgba(102, 126, 234, 0.3);
        }

        /* Select dropdown options */
        .admin-form-select option {
            background: rgb(255, 255, 255);
            color: rgb(30, 41, 59);
            padding: 0.5rem;
        }

        .dark .admin-form-select option {
            background: rgb(30, 41, 59);
            color: rgb(241, 245, 249);
        }

        /* Ensure all form elements have proper colors */
        select, input, textarea {
            background-color: rgb(255, 255, 255) !important;
            color: rgb(30, 41, 59) !important;
        }

        .dark select, .dark input, .dark textarea {
            background-color: rgb(30, 41, 59) !important;
            color: rgb(241, 245, 249) !important;
        }

        .dark select option, .dark input option {
            background-color: rgb(30, 41, 59) !important;
            color: rgb(241, 245, 249) !important;
        }

        /* Additional form element fixes */
        .admin-content select,
        .admin-content input,
        .admin-content textarea {
            background-color: rgb(255, 255, 255) !important;
            color: rgb(30, 41, 59) !important;
            border: 1px solid rgba(156, 163, 175, 0.3) !important;
        }

        .dark .admin-content select,
        .dark .admin-content input,
        .dark .admin-content textarea {
            background-color: rgb(30, 41, 59) !important;
            color: rgb(241, 245, 249) !important;
            border-color: rgba(75, 85, 99, 0.5) !important;
        }

        /* Fix for any remaining white text issues */
        .admin-card select,
        .admin-card input,
        .admin-card textarea {
            background-color: rgb(255, 255, 255) !important;
            color: rgb(30, 41, 59) !important;
        }

        .dark .admin-card select,
        .dark .admin-card input,
        .dark .admin-card textarea {
            background-color: rgb(30, 41, 59) !important;
            color: rgb(241, 245, 249) !important;
        }

        /* Global form element fixes for admin area */
        body[class*="admin"] select,
        body[class*="admin"] input,
        body[class*="admin"] textarea,
        .admin-layout select,
        .admin-layout input,
        .admin-layout textarea {
            background-color: rgb(255, 255, 255) !important;
            color: rgb(30, 41, 59) !important;
        }

        body[class*="admin"].dark select,
        body[class*="admin"].dark input,
        body[class*="admin"].dark textarea,
        .dark .admin-layout select,
        .dark .admin-layout input,
        .dark .admin-layout textarea {
            background-color: rgb(30, 41, 59) !important;
            color: rgb(241, 245, 249) !important;
        }

        /* Ensure dropdown options are visible */
        select option {
            background-color: rgb(255, 255, 255) !important;
            color: rgb(30, 41, 59) !important;
            padding: 8px !important;
        }

        .dark select option {
            background-color: rgb(30, 41, 59) !important;
            color: rgb(241, 245, 249) !important;
        }

        /* Enhanced Modals */
        .admin-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .admin-modal-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.2);
            border-radius: 1.5rem;
            padding: 2rem;
            max-width: 90vw;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.9) translateY(20px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-2xl);
        }

        .admin-modal.show .admin-modal-content {
            transform: scale(1) translateY(0);
        }

        .dark .admin-modal-content {
            background: rgba(30, 41, 59, 0.95);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .admin-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        }

        .admin-modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .dark .admin-modal-title {
            color: #f1f5f9;
        }

        .admin-modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #64748b;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-modal-close:hover {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
            transform: scale(1.1);
        }

        /* Enhanced Responsive Design */
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
            }
            
            .admin-sidebar.show {
                transform: translateX(0);
            }
            
            .admin-main {
                margin-left: 0;
            }

            .admin-sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .admin-sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }
        }

        @media (max-width: 768px) {
            .admin-content {
                padding: 1rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .admin-table-container {
                overflow-x: auto;
            }
            
            .admin-modal-content {
                margin: 1rem;
                padding: 1.5rem;
            }

            .admin-header-content {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

        .page-title {
                font-size: 1.5rem;
                text-align: center;
            }

            .admin-user-menu {
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            .admin-card {
                padding: 1rem;
            }

            .admin-sidebar-header {
                padding: 1rem;
            }

            .sidebar-item {
                margin: 0.125rem 0.5rem;
            }

            .sidebar-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
            }
        }

        /* Enhanced Animations */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal-on-scroll.reveal-active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-on-scroll.reveal-left {
            transform: translateX(-30px);
        }

        .reveal-on-scroll.reveal-left.reveal-active {
            transform: translateX(0);
        }

        .reveal-on-scroll.reveal-right {
            transform: translateX(30px);
        }

        .reveal-on-scroll.reveal-right.reveal-active {
            transform: translateX(0);
        }

        .reveal-on-scroll.reveal-scale {
            transform: scale(0.9) translateY(30px);
        }

        .reveal-on-scroll.reveal-scale.reveal-active {
            transform: scale(1) translateY(0);
        }

        /* Enhanced Loading States */
        .admin-loading {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: admin-spin 1s ease-in-out infinite;
        }

        @keyframes admin-spin {
            to { transform: rotate(360deg); }
        }

        /* Enhanced Scrollbar */
        .admin-sidebar::-webkit-scrollbar,
        .admin-modal-content::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track,
        .admin-modal-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .admin-sidebar::-webkit-scrollbar-thumb,
        .admin-modal-content::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb:hover,
        .admin-modal-content::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500 loading">
    <div class="admin-layout flex">
        <!-- Mobile Sidebar Overlay -->
        <div class="admin-sidebar-overlay lg:hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>
        
        <!-- Enhanced Sidebar -->
        <aside class="admin-sidebar w-64 min-h-screen flex-shrink-0" id="adminSidebar">
            <!-- Sidebar Header -->
            <div class="admin-sidebar-header p-6">
                <div class="flex items-center space-x-3">
                    <div class="admin-logo w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-blue-600 font-black text-2xl">N</span>
        </div>
                    <div class="flex flex-col">
                        <span class="text-white text-xl font-black leading-tight">NexBuy</span>
                        <span class="text-white/80 text-sm font-medium">Admin</span>
                    </div>
                </div>
                <p class="text-white/70 text-sm mt-3">Dashboard</p>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="sidebar-nav">
                <div class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                        Dashboard
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                        Products
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                        Categories
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                        Users
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                        Orders
                </a>
        </div>

                <div class="sidebar-item">
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Settings
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <svg class="sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        View Website
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="admin-main flex-1 flex flex-col">
            <!-- Enhanced Header -->
            <header class="admin-header">
                <div class="admin-header-content">
                    <div class="flex items-center space-x-4">
                        <!-- Mobile Menu Toggle -->
                        <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200" onclick="toggleSidebar()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>

                        <h1 class="page-title">@yield('title', 'Dashboard')</h1>
                                </div>
                                
                    <div class="admin-user-menu">
                        <div class="admin-user-avatar" onclick="toggleUserMenu()">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Enhanced Content Area -->
            <main class="admin-content flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Enhanced Scripts -->
    <script>
        // Enhanced Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
            
            // Prevent body scroll when sidebar is open on mobile
            if (sidebar.classList.contains('show')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        // Enhanced User Menu Toggle
        function toggleUserMenu() {
            // Implement user menu dropdown
            console.log('User menu clicked');
        }

        // Enhanced Intersection Observer for reveal animations with performance optimization
        let adminRevealObserver;
        
        // Lazy load intersection observer for better performance
        if ('IntersectionObserver' in window) {
            adminRevealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-active');
                        // Stop observing once revealed
                        adminRevealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -100px 0px'
            });
        }

        // Observe all elements with reveal classes
        document.addEventListener('DOMContentLoaded', function() {
            if (adminRevealObserver) {
                const revealElements = document.querySelectorAll('.reveal-on-scroll');
                revealElements.forEach(el => adminRevealObserver.observe(el));
            }
        });

        // Sync dark mode with main website
        function syncDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'true';
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        // Listen for dark mode changes from main website
        window.addEventListener('darkModeChanged', function(event) {
            if (event.detail.isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });

        // Initialize dark mode sync
        syncDarkMode();

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Performance optimization: Lazy load images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            observer.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Add loading states for better UX
        document.addEventListener('DOMContentLoaded', function() {
            // Remove loading class from body
            document.body.classList.remove('loading');
            
            // Add smooth transitions after page load
            setTimeout(() => {
                document.body.classList.add('loaded');
            }, 100);
        });
    </script>

    @stack('scripts')
</body>
</html>
