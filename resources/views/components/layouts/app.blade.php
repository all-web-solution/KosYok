<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kos Melati Indah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Alpine.js untuk simulasi Livewire -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #e0e7ff;
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c73e6 100%);
            --secondary: #10b981;
            --secondary-gradient: linear-gradient(135deg, #10b981 0%, #34d399 100%);
            --accent: #f59e0b;
            --accent-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
            --danger: #ef4444;
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
            --dark: #1e293b;
            --dark-light: #334155;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --white: #ffffff;
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
            --header-height: 70px;
            
            --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.15);
            --shadow-xl: 0 24px 64px rgba(0, 0, 0, 0.18);
            
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-full: 9999px;
            
            --transition-fast: 0.15s ease;
            --transition-base: 0.3s ease;
            --transition-slow: 0.5s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            line-height: 1.2;
        }

        /* Layout */
        .livewire-dashboard {
            display: flex;
            min-height: 100vh;
            background: #f1f5f9;
        }

        /* Sidebar Modern */
        .livewire-sidebar {
            width: var(--sidebar-width);
            background: var(--white);
            position: fixed;
            height: 100vh;
            z-index: 1000;
            transition: all var(--transition-base);
            overflow-y: auto;
            box-shadow: var(--shadow-md);
            border-right: 1px solid var(--gray-light);
        }

        .livewire-sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid var(--gray-light);
            position: sticky;
            top: 0;
            background: var(--white);
            z-index: 10;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            background: var(--primary-gradient);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .brand-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            white-space: nowrap;
            overflow: hidden;
            transition: opacity var(--transition-base);
        }

        .livewire-sidebar.collapsed .brand-text {
            opacity: 0;
            width: 0;
            position: absolute;
        }

        .nav-menu {
            padding: 1.5rem 0.75rem;
        }

        .nav-item {
            margin-bottom: 0.5rem;
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--gray);
            text-decoration: none;
            border-radius: var(--radius-md);
            transition: all var(--transition-fast);
            position: relative;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-link:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .nav-link.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            flex-shrink: 0;
            min-width: 20px;
        }

        .nav-label {
            flex: 1;
            overflow: hidden;
            font-size: 0.9rem;
            font-weight: 500;
            transition: opacity var(--transition-base);
        }

        .livewire-sidebar.collapsed .nav-label {
            opacity: 0;
            width: 0;
            position: absolute;
        }

        .nav-badge {
            background: var(--secondary);
            color: white;
            font-size: 0.7rem;
            padding: 0.15rem 0.5rem;
            border-radius: var(--radius-full);
            font-weight: 600;
        }

        .sidebar-divider {
            height: 1px;
            background: var(--gray-light);
            margin: 1.5rem 0;
        }

        .nav-section {
            padding: 0.5rem 1rem 0.5rem;
            font-size: 0.75rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity var(--transition-base);
        }

        .livewire-sidebar.collapsed .nav-section {
            opacity: 0;
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .sidebar-toggle-btn {
            position: absolute;
            top: 1.5rem;
            right: -12px;
            width: 24px;
            height: 24px;
            background: var(--white);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            cursor: pointer;
            box-shadow: var(--shadow-md);
            z-index: 101;
            border: 2px solid var(--gray-light);
            transition: all var(--transition-base);
        }

        .sidebar-toggle-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* Mobile sidebar toggle */
        .mobile-menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: var(--primary-light);
            border: none;
            color: var(--primary);
            font-size: 1.2rem;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-fast);
        }

        .mobile-menu-toggle:hover {
            background: var(--primary);
            color: white;
        }

        /* Main Content */
        .livewire-main {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all var(--transition-base);
            min-height: 100vh;
            width: calc(100% - var(--sidebar-width));
        }

        .livewire-main.expanded {
            margin-left: var(--sidebar-collapsed);
            width: calc(100% - var(--sidebar-collapsed));
        }

        /* Header Modern */
        .livewire-header {
            background: var(--white);
            height: var(--header-height);
            border-bottom: 1px solid var(--gray-light);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 900;
            box-shadow: var(--shadow-xs);
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-title h1 {
            font-size: 1.5rem;
            color: var(--dark);
            font-weight: 700;
        }

        .page-subtitle {
            font-size: 0.875rem;
            color: var(--gray);
            margin-top: 0.25rem;
        }

        .header-tools {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .livewire-search {
            position: relative;
        }

        .search-input {
            padding: 0.7rem 1rem 0.7rem 2.5rem;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            width: 280px;
            transition: all var(--transition-base);
            background: #f8fafc;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .notification-wrapper {
            position: relative;
        }

        .notification-btn {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-full);
            background: var(--primary-light);
            border: none;
            color: var(--primary);
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-fast);
        }

        .notification-btn:hover {
            background: var(--primary);
            color: white;
        }

        .notification-indicator {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 10px;
            height: 10px;
            background: var(--danger);
            border-radius: 50%;
            border: 2px solid white;
        }

        .user-dropdown {
            position: relative;
        }

        .user-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: var(--radius-full);
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .user-btn:hover {
            background: var(--primary-light);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark);
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray);
        }

        /* Livewire Content */
        .livewire-content {
            padding: 1.5rem;
        }

        /* Stats Cards Modern - Diubah untuk 3 card per baris di HP */
        .livewire-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.25rem;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-base);
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .stat-card.primary {
            border-top: 4px solid var(--primary);
        }

        .stat-card.secondary {
            border-top: 4px solid var(--secondary);
        }

        .stat-card.accent {
            border-top: 4px solid var(--accent);
        }

        .stat-card.danger {
            border-top: 4px solid var(--danger);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }

        .stat-title {
            font-size: 0.8rem;
            color: var(--gray);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.15rem 0.4rem;
            border-radius: var(--radius-full);
            background: var(--primary-light);
            color: var(--primary);
            white-space: nowrap;
        }

        .stat-trend.positive {
            background: #d1fae5;
            color: #065f46;
        }

        .stat-trend.negative {
            background: #fee2e2;
            color: #991b1b;
        }

        .stat-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            flex-shrink: 0;
        }

        .stat-icon.primary {
            background: var(--primary-gradient);
        }

        .stat-icon.secondary {
            background: var(--secondary-gradient);
        }

        .stat-icon.accent {
            background: var(--accent-gradient);
        }

        .stat-icon.danger {
            background: var(--danger-gradient);
        }

        /* Livewire Charts */
        .livewire-charts {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-container {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
            min-width: 0;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .chart-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .chart-wrapper {
            height: 300px;
            position: relative;
            min-width: 0;
        }

        /* Recent Activity */
        .livewire-activity {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
            margin-bottom: 2rem;
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .activity-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--gray-light);
            transition: all var(--transition-fast);
        }

        .activity-item:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            color: white;
            font-size: 1rem;
        }

        .activity-icon.income {
            background: var(--secondary-gradient);
        }

        .activity-icon.tenant {
            background: var(--primary-gradient);
        }

        .activity-icon.maintenance {
            background: var(--accent-gradient);
        }

        .activity-icon.booking {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
        }

        .activity-details {
            flex: 1;
            min-width: 0;
        }

        .activity-text {
            font-weight: 500;
            margin-bottom: 0.25rem;
            word-break: break-word;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--gray);
        }

        /* Quick Actions */
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all var(--transition-base);
            border: 2px solid transparent;
            box-shadow: var(--shadow-sm);
        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: var(--shadow-md);
        }

        .action-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 1rem;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .action-icon.add {
            background: var(--primary-gradient);
        }

        .action-icon.payment {
            background: var(--secondary-gradient);
        }

        .action-icon.report {
            background: var(--accent-gradient);
        }

        .action-icon.settings {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
        }

        .action-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .action-desc {
            font-size: 0.875rem;
            color: var(--gray);
        }

        /* Recent Bookings */
        .livewire-table {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .table-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .table thead {
            background: #f8fafc;
        }

        .table th {
            padding: 1rem 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--gray-light);
            white-space: nowrap;
        }

        .table td {
            padding: 1rem 1rem;
            border-bottom: 1px solid var(--gray-light);
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .table tbody tr {
            transition: all var(--transition-fast);
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .status-badge {
            padding: 0.35rem 0.75rem;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
        }

        .status-paid {
            background: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-full);
            border: none;
            background: #f1f5f9;
            color: var(--gray);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-fast);
            flex-shrink: 0;
        }

        .btn-action:hover {
            background: var(--primary);
            color: white;
        }

        /* Livewire Modal */
        .livewire-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: var(--white);
            border-radius: var(--radius-lg);
            max-width: 500px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--gray);
            cursor: pointer;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-full);
            transition: all var(--transition-fast);
        }

        .modal-close:hover {
            background: #f1f5f9;
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            transition: all var(--transition-fast);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            background: white;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-fast);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Livewire Loading */
        .livewire-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 3000;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid var(--primary-light);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Responsive Design - Fokus pada Card Layout */
        @media (max-width: 1400px) {
            .livewire-charts {
                grid-template-columns: 1fr;
            }
            
            .chart-wrapper {
                height: 250px;
            }
        }

        @media (max-width: 1200px) {
            .search-input {
                width: 200px;
            }
        }

        /* Tablet - 2 cards per row */
        @media (max-width: 992px) {
            .livewire-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .stat-card {
                padding: 1rem;
                min-height: 110px;
            }
            
            .stat-value {
                font-size: 1.4rem;
            }
            
            .stat-icon {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
            }
            
            .livewire-content {
                padding: 1rem;
            }
            
            .chart-container {
                padding: 1.25rem;
            }
        }

        /* Mobile Large - 2 cards per row, lebih kompak */
        @media (max-width: 768px) {
            .livewire-sidebar {
                transform: translateX(-100%);
                width: 280px;
                box-shadow: var(--shadow-xl);
            }
            
            .livewire-sidebar.active {
                transform: translateX(0);
            }
            
            .livewire-main {
                margin-left: 0 !important;
                width: 100% !important;
            }
            
            .livewire-header {
                padding: 0 1rem;
                height: 60px;
            }
            
            .mobile-menu-toggle {
                display: flex;
            }
            
            .page-title h1 {
                font-size: 1.25rem;
            }
            
            .user-info {
                display: none;
            }
            
            .search-input {
                width: 150px;
            }
            
            .livewire-content {
                padding: 1rem 0.75rem;
            }
            
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .chart-wrapper {
                height: 200px;
            }
            
            .activity-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .table-header {
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem;
            }
            
            .table th, .table td {
                padding: 0.75rem 0.5rem;
            }
            
            .modal-content {
                margin: 1rem;
                max-height: 85vh;
            }
        }

        /* Mobile Medium - 2 cards per row dengan ukuran lebih kecil */
        @media (max-width: 576px) {
            .livewire-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
            }
            
            .stat-card {
                padding: 0.875rem;
                min-height: 100px;
            }
            
            .stat-header {
                margin-bottom: 0.5rem;
            }
            
            .stat-title {
                font-size: 0.7rem;
            }
            
            .stat-trend {
                font-size: 0.6rem;
                padding: 0.1rem 0.3rem;
            }
            
            .stat-value {
                font-size: 1.25rem;
            }
            
            .stat-icon {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }
            
            .search-input {
                display: none;
            }
            
            .header-tools {
                gap: 0.5rem;
            }
            
            .notification-btn {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }
            
            .user-avatar {
                width: 36px;
                height: 36px;
            }
            
            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-card {
                padding: 1rem;
            }
            
            .action-icon {
                width: 42px;
                height: 42px;
                font-size: 1.25rem;
            }
        }

        /* Mobile Small - 3 cards per row untuk HP kecil */
        @media (max-width: 480px) {
            .livewire-stats {
                grid-template-columns: repeat(3, 1fr);
                gap: 0.5rem;
            }
            
            .stat-card {
                padding: 0.75rem;
                min-height: 90px;
                border-radius: var(--radius-md);
            }
            
            .stat-value {
                font-size: 1rem;
            }
            
            .stat-icon {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
                border-radius: var(--radius-sm);
            }
            
            .stat-title {
                font-size: 0.65rem;
                margin-bottom: 0.25rem;
            }
            
            .stat-trend {
                display: none; /* Sembunyikan trend di HP kecil untuk menghemat ruang */
            }
            
            .page-title h1 {
                font-size: 1.1rem;
            }
            
            .page-subtitle {
                font-size: 0.75rem;
            }
            
            .chart-container {
                padding: 1rem;
            }
            
            .livewire-activity {
                padding: 1rem;
            }
            
            .activity-item {
                padding: 0.75rem;
            }
            
            .activity-icon {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
                margin-right: 0.75rem;
            }
            
            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
            }
            
            .action-card {
                padding: 1rem;
            }
            
            .action-title {
                font-size: 0.9rem;
            }
            
            .action-desc {
                font-size: 0.75rem;
            }
        }

        /* Extra Small Devices - 3 cards per row dengan ukuran minimal */
        @media (max-width: 360px) {
            .livewire-stats {
                grid-template-columns: repeat(3, 1fr);
                gap: 0.4rem;
            }
            
            .stat-card {
                padding: 0.6rem;
                min-height: 85px;
            }
            
            .stat-value {
                font-size: 0.9rem;
            }
            
            .stat-icon {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }
            
            .stat-title {
                font-size: 0.6rem;
            }
            
            .page-title h1 {
                font-size: 1rem;
            }
            
            .page-subtitle {
                font-size: 0.7rem;
            }
            
            .quick-actions-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }

        .d-flex {
            display: flex !important;
        }

        .d-block {
            display: block !important;
        }

        @media (min-width: 769px) {
            .d-md-none {
                display: none !important;
            }
            
            .d-md-flex {
                display: flex !important;
            }
        }

        /* Overlay untuk mobile sidebar */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Livewire Dashboard Container -->
    <div class="livewire-dashboard" x-data="livewireDashboard()">
        <!-- Loading Overlay -->
        <div class="livewire-loading" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>

        <!-- Overlay untuk mobile sidebar -->
        <div class="sidebar-overlay" id="sidebarOverlay" @click="toggleMobileSidebar"></div>

        <!-- Sidebar -->
        @include('components.layouts.sidebar')

        <!-- Main Content -->
        <main class="livewire-main" id="mainContent" x-bind:class="sidebarCollapsed ? 'expanded' : ''">
            <!-- Header -->
            @include('components.layouts.header')
            
            <!-- Content -->
            {{$slot}}
        </main>
    </div>

    

    <script>
        // Simulasi Livewire dengan Alpine.js
        function livewireDashboard() {
            return {
                // State
                sidebarCollapsed: false,
                mobileSidebarActive: false,
                searchQuery: '',
                roomCount: 24,
                tenantCount: 18,
                pendingPayments: 3,
                vacantRooms: 6,
                roomChange: 12,
                unreadNotifications: 3,
                selectedYear: '2024',
                revenueChart: null,
                roomChart: null,
                
                // Methods
                init() {
                    this.initCharts();
                    
                    // Inisialisasi untuk mobile
                    this.checkMobile();
                    
                    // Event listeners
                    window.addEventListener('resize', () => {
                        this.checkMobile();
                        this.updateChartLegend();
                    });
                    
                    document.addEventListener('keydown', (e) => {
                        if (e.ctrlKey && e.key === 'k') {
                            e.preventDefault();
                            const searchInput = document.querySelector('.search-input');
                            if (searchInput) searchInput.focus();
                        }
                        
                        if (e.key === 'Escape') {
                            this.closeAllModals();
                            this.hideMobileSidebar();
                        }
                    });
                },
                
                checkMobile() {
                    if (window.innerWidth <= 768) {
                        this.sidebarCollapsed = false;
                    } else {
                        this.mobileSidebarActive = false;
                        document.getElementById('sidebarOverlay').classList.remove('active');
                    }
                },
                
                initCharts() {
                    // Revenue Chart
                    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
                    this.revenueChart = new Chart(revenueCtx, {
                        type: 'line',
                        data: {
                            labels: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                            datasets: [{
                                label: 'Pendapatan (Juta Rp)',
                                data: [12.5, 13.2, 14.1, 14.8, 15.2, 16.5],
                                borderColor: '#4f46e5',
                                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                                borderWidth: 3,
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: '#4f46e5',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                pointRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {
                                        padding: 20,
                                        usePointStyle: true
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp ' + value + 'Jt';
                                        }
                                    },
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    }
                                },
                                x: {
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    }
                                }
                            }
                        }
                    });

                    // Room Status Chart
                    this.updateChartLegend();
                },
                
                updateChartLegend() {
                    const isMobile = window.innerWidth <= 768;
                    const legendPosition = isMobile ? 'bottom' : 'right';
                    
                    if (this.roomChart) {
                        this.roomChart.destroy();
                    }
                    
                    const roomCtx = document.getElementById('roomStatusChart').getContext('2d');
                    this.roomChart = new Chart(roomCtx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Terisi', 'Kosong', 'Perbaikan'],
                            datasets: [{
                                data: [18, 6, 2],
                                backgroundColor: [
                                    '#10b981',
                                    '#4f46e5',
                                    '#f59e0b'
                                ],
                                borderWidth: 2,
                                borderColor: '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: legendPosition,
                                    labels: {
                                        padding: isMobile ? 10 : 20,
                                        usePointStyle: true,
                                        font: {
                                            size: isMobile ? 10 : 12
                                        }
                                    }
                                }
                            },
                            cutout: '75%'
                        }
                    });
                },
                
                updateChart() {
                    // Simulasi update chart berdasarkan tahun yang dipilih
                    console.log('Memperbarui chart untuk tahun:', this.selectedYear);
                    
                    // Dalam implementasi nyata, ini akan memanggil Livewire untuk data baru
                    if (this.selectedYear === '2023') {
                        this.revenueChart.data.datasets[0].data = [10.5, 11.2, 11.8, 12.5, 13.0, 13.8];
                    } else {
                        this.revenueChart.data.datasets[0].data = [12.5, 13.2, 14.1, 14.8, 15.2, 16.5];
                    }
                    
                    this.revenueChart.update();
                },
                
                toggleSidebar() {
                    if (window.innerWidth <= 768) {
                        this.toggleMobileSidebar();
                    } else {
                        this.sidebarCollapsed = !this.sidebarCollapsed;
                    }
                },
                
                toggleMobileSidebar() {
                    this.mobileSidebarActive = !this.mobileSidebarActive;
                    const overlay = document.getElementById('sidebarOverlay');
                    if (this.mobileSidebarActive) {
                        overlay.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    } else {
                        overlay.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                },
                
                hideMobileSidebar() {
                    this.mobileSidebarActive = false;
                    document.getElementById('sidebarOverlay').classList.remove('active');
                    document.body.style.overflow = 'auto';
                },
                
                openModal(modalType) {
                    const modalId = modalType + 'Modal';
                    document.getElementById(modalId).style.display = 'flex';
                },
                
                closeModal(modalId) {
                    document.getElementById(modalId).style.display = 'none';
                },
                
                closeAllModals() {
                    const modals = document.querySelectorAll('.livewire-modal');
                    modals.forEach(modal => {
                        modal.style.display = 'none';
                    });
                },
                
                showNotifications() {
                    this.openModal('notifications');
                },
                
                toggleUserMenu() {
                    // Simulasi dropdown menu
                    alert('Menu pengguna akan ditampilkan di sini');
                },
                
                openMobileSearch() {
                    this.openModal('mobileSearch');
                },
                
                performSearch() {
                    if (this.searchQuery.trim()) {
                        this.showLoading();
                        setTimeout(() => {
                            this.hideLoading();
                            this.closeModal('mobileSearchModal');
                            alert('Mencari: ' + this.searchQuery);
                        }, 500);
                    }
                },
                
                logout() {
                    if (confirm('Apakah Anda yakin ingin keluar?')) {
                        this.showLoading();
                        setTimeout(() => {
                            this.hideLoading();
                            window.location.href = 'login.html';
                        }, 1000);
                    }
                },
                
                generateReport() {
                    this.showLoading();
                    setTimeout(() => {
                        this.hideLoading();
                        alert('Laporan berhasil digenerate! File akan diunduh.');
                    }, 1500);
                },
                
                markAllAsRead() {
                    this.unreadNotifications = 0;
                    this.closeModal('notificationsModal');
                    alert('Semua notifikasi telah ditandai sebagai dibaca');
                },
                
                viewPayment(id) {
                    alert('Menampilkan detail pembayaran ID: ' + id);
                },
                
                approvePayment(id) {
                    if (confirm('Setujui pembayaran ini?')) {
                        this.showLoading();
                        setTimeout(() => {
                            this.hideLoading();
                            alert('Pembayaran ID ' + id + ' telah disetujui');
                        }, 500);
                    }
                },
                
                printReceipt(id) {
                    alert('Mencetak struk untuk pembayaran ID: ' + id);
                },
                
                reprocessPayment(id) {
                    alert('Memproses ulang pembayaran ID: ' + id);
                },
                
                submitRoomForm() {
                    this.showLoading();
                    setTimeout(() => {
                        this.hideLoading();
                        this.closeModal('addRoomModal');
                        this.roomCount++;
                        this.vacantRooms++;
                        alert('Kamar berhasil ditambahkan!');
                    }, 1000);
                },
                
                submitTenantForm() {
                    this.showLoading();
                    setTimeout(() => {
                        this.hideLoading();
                        this.closeModal('addTenantModal');
                        this.tenantCount++;
                        this.vacantRooms--;
                        alert('Penghuni berhasil ditambahkan!');
                    }, 1000);
                },
                
                showLoading() {
                    document.getElementById('loadingOverlay').style.display = 'flex';
                },
                
                hideLoading() {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }
            };
        }
    </script>
</body>
</html>