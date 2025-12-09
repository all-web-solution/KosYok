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
    <style>
        :root {
            --primary: #00a859;
            --primary-dark: #008245;
            --primary-light: #e8f7f0;
            --primary-gradient: linear-gradient(135deg, #00a859 0%, #00c985 100%);
            --secondary: #ff7a00;
            --secondary-gradient: linear-gradient(135deg, #ff7a00 0%, #ff9a3d 100%);
            --accent: #7b61ff;
            --accent-gradient: linear-gradient(135deg, #7b61ff 0%, #9d8aff 100%);
            --dark: #1a1d29;
            --dark-light: #2a2f3d;
            --light: #f8fafc;
            --gray: #8a94a6;
            --gray-light: #e2e8f0;
            --white: #ffffff;
            --sidebar-width: 250px;
            --sidebar-collapsed: 70px;
            --header-height: 70px;

            --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.15);
            --shadow-xl: 0 24px 64px rgba(0, 0, 0, 0.18);

            --radius-sm: 10px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 32px;
            --radius-full: 50%;

            --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark);
            color: white;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: all var(--transition-base);
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-admin {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .sidebar-title {
            font-size: 1.1rem;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar.collapsed .sidebar-title {
            opacity: 0;
            width: 0;
        }

        .sidebar-menu {
            padding: 1.5rem 0;
        }

        .menu-item {
            padding: 0.8rem 1rem;
            margin: 0.2rem 0.5rem;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all var(--transition-base);
            position: relative;
            white-space: nowrap;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .menu-item.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .menu-item i {
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .menu-text {
            flex: 1;
            overflow: hidden;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
        }

        .menu-badge {
            background: var(--secondary);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-weight: 600;
        }

        .menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 1rem 0;
        }

        .menu-section {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            white-space: nowrap;
        }

        .sidebar.collapsed .menu-section {
            opacity: 0;
            width: 0;
        }

        .sidebar-toggle {
            position: absolute;
            top: 1.5rem;
            right: -12px;
            width: 24px;
            height: 24px;
            background: var(--primary-gradient);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            z-index: 101;
            border: 2px solid var(--dark);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all var(--transition-base);
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed);
        }

        /* Header */
        .main-header {
            background: var(--white);
            height: var(--header-height);
            border-bottom: 1px solid var(--gray-light);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 90;
            box-shadow: var(--shadow-xs);
        }

        .header-left h1 {
            font-size: 1.5rem;
            color: var(--dark);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 0.7rem 1rem 0.7rem 2.5rem;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            width: 300px;
            transition: all var(--transition-base);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 168, 89, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .notification-bell {
            position: relative;
            cursor: pointer;
            padding: 0.5rem;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--secondary);
            color: white;
            font-size: 0.6rem;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
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
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray);
        }

        /* Content Area */
        .content-wrapper {
            padding: 2rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-base);
            border: 1px solid var(--gray-light);
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
        }

        .stat-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-info h3 {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            margin-top: 0.8rem;
        }

        .stat-change.positive {
            color: #00a859;
        }

        .stat-change.negative {
            color: #ff4757;
        }

        /* Charts Section */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-header h3 {
            font-size: 1.2rem;
            color: var(--dark);
        }

        .chart-container {
            height: 300px;
            position: relative;
        }

        /* Recent Activity */
        .activity-list {
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
        }

        .activity-header h3 {
            font-size: 1.2rem;
            color: var(--dark);
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
            gap: 1rem;
            transition: all var(--transition-base);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:hover {
            background: var(--primary-light);
            border-radius: var(--radius-md);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-light);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--gray);
        }

        /* Recent Bookings */
        .bookings-table {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .table-header h3 {
            font-size: 1.2rem;
            color: var(--dark);
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: var(--primary-light);
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
            font-size: 0.9rem;
        }

        tbody tr:hover {
            background: var(--primary-light);
        }

        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-paid {
            background: #d4edda;
            color: #155724;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .btn-icon {
            padding: 0.5rem;
            border: none;
            background: none;
            color: var(--gray);
            cursor: pointer;
            border-radius: var(--radius-sm);
            transition: all var(--transition-base);
        }

        .btn-icon:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-btn {
            background: var(--white);
            border: 2px dashed var(--gray-light);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            cursor: pointer;
            transition: all var(--transition-base);
        }

        .action-btn:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .action-text {
            font-weight: 600;
            color: var(--dark);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
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

        .modal-header h3 {
            font-size: 1.3rem;
            color: var(--dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: var(--gray);
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-full);
            transition: all var(--transition-base);
        }

        .modal-close:hover {
            background: var(--gray-light);
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-header {
                padding: 0 1rem;
            }

            .search-input {
                width: 200px;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .content-wrapper {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-input {
                width: 150px;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .search-box {
                display: none;
            }

            .header-left h1 {
                font-size: 1.2rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body>
    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-toggle" onclick="toggleSidebar()">
                <i class="fas fa-chevron-left"></i>
            </div>

            <div class="sidebar-header">
                <div class="logo-admin">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-title">
                    Kos Melati Indah
                </div>
            </div>

            <div class="sidebar-menu">
                <div class="menu-section">UTAMA</div>
                <a href="#" class="menu-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>

                <div class="menu-section">MANAJEMEN</div>
                <a href="#" class="menu-item">
                    <i class="fas fa-bed"></i>
                    <span class="menu-text">Kamar</span>
                    <span class="menu-badge">8</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span class="menu-text">Penghuni</span>
                    <span class="menu-badge">15</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span class="menu-text">Pembayaran</span>
                    <span class="menu-badge">3</span>
                </a>

                <div class="menu-section">LAINNYA</div>
                <a href="#" class="menu-item">
                    <i class="fas fa-cog"></i>
                    <span class="menu-text">Pengaturan</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-chart-bar"></i>
                    <span class="menu-text">Laporan</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-question-circle"></i>
                    <span class="menu-text">Bantuan</span>
                </a>

                <div class="menu-divider"></div>

                <a href="#" class="menu-item" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-text">Keluar</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Header -->
            <header class="main-header">
                <div class="header-left">
                    <h1>Dashboard Admin</h1>
                </div>

                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Cari...">
                    </div>

                    <div class="notification-bell" onclick="showNotifications()">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>

                    <div class="user-profile" onclick="toggleUserMenu()">
                        <div class="user-avatar">
                            A
                        </div>
                        <div class="user-info">
                            <div class="user-name">Admin Kos</div>
                            <div class="user-role">Super Admin</div>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </header>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Total Kamar</h3>
                                <div class="stat-number">24</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>12% dari bulan lalu</span>
                                </div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-bed"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Penghuni Aktif</h3>
                                <div class="stat-number">18</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>2 penghuni baru</span>
                                </div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Pendapatan Bulan Ini</h3>
                                <div class="stat-number">Rp 15.2Jt</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>8% dari bulan lalu</span>
                                </div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Kamar Kosong</h3>
                                <div class="stat-number">6</div>
                                <div class="stat-change negative">
                                    <i class="fas fa-arrow-down"></i>
                                    <span>2 kamar terisi</span>
                                </div>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-door-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-btn" onclick="openModal('addRoom')">
                        <div class="action-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="action-text">Tambah Kamar</div>
                    </div>

                    <div class="action-btn" onclick="openModal('addTenant')">
                        <div class="action-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="action-text">Tambah Penghuni</div>
                    </div>

                    <div class="action-btn" onclick="openModal('addPayment')">
                        <div class="action-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="action-text">Input Pembayaran</div>
                    </div>

                    <div class="action-btn" onclick="generateReport()">
                        <div class="action-icon">
                            <i class="fas fa-file-export"></i>
                        </div>
                        <div class="action-text">Generate Laporan</div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Statistik Pendapatan 6 Bulan Terakhir</h3>
                            <select class="form-control" style="width: auto; padding: 0.5rem;">
                                <option>2024</option>
                                <option>2023</option>
                            </select>
                        </div>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Status Kamar</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="roomStatusChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="activity-list">
                    <div class="activity-header">
                        <h3>Aktivitas Terbaru</h3>
                        <a href="#" style="color: var(--primary); text-decoration: none; font-size: 0.9rem;">Lihat Semua</a>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pembayaran diterima dari Andi</div>
                            <div class="activity-time">10 menit yang lalu</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Penghuni baru: Sari</div>
                            <div class="activity-time">1 jam yang lalu</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Perbaikan kamar 201 selesai</div>
                            <div class="activity-time">3 jam yang lalu</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Booking kamar 105</div>
                            <div class="activity-time">Hari ini, 09:30</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bookings-table">
                    <div class="table-header">
                        <h3>Pembayaran Terbaru</h3>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kamar</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#001</td>
                                    <td>Budi Santoso</td>
                                    <td>101</td>
                                    <td>Rp 1,200,000</td>
                                    <td>15 Jan 2024</td>
                                    <td><span class="status-badge status-paid">Lunas</span></td>
                                    <td>
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#002</td>
                                    <td>Sari Dewi</td>
                                    <td>205</td>
                                    <td>Rp 1,500,000</td>
                                    <td>14 Jan 2024</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>
                                        <button class="btn-icon"><i class="fas fa-check"></i></button>
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#003</td>
                                    <td>Rudi Hartono</td>
                                    <td>103</td>
                                    <td>Rp 1,200,000</td>
                                    <td>13 Jan 2024</td>
                                    <td><span class="status-badge status-paid">Lunas</span></td>
                                    <td>
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#004</td>
                                    <td>Maya Sari</td>
                                    <td>302</td>
                                    <td>Rp 1,800,000</td>
                                    <td>12 Jan 2024</td>
                                    <td><span class="status-badge status-cancelled">Batal</span></td>
                                    <td>
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-redo"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modals -->
    <!-- Add Room Modal -->
    <div class="modal" id="addRoomModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Kamar Baru</h3>
                <button class="modal-close" onclick="closeModal('addRoomModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addRoomForm">
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Nomor Kamar</label>
                        <input type="text" class="form-control" placeholder="Contoh: 101" required>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Tipe Kamar</label>
                        <select class="form-control" required>
                            <option value="">Pilih Tipe</option>
                            <option value="standard">Standard</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Harga per Bulan</label>
                        <input type="number" class="form-control" placeholder="Contoh: 1200000" required>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Fasilitas</label>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.5rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem;">
                                <input type="checkbox"> AC
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem;">
                                <input type="checkbox"> Kamar Mandi Dalam
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem;">
                                <input type="checkbox"> WiFi
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem;">
                                <input type="checkbox"> Lemari
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; padding: 0.8rem; margin-top: 1rem;">
                        <i class="fas fa-save"></i> Simpan Kamar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Tenant Modal -->
    <div class="modal" id="addTenantModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Penghuni Baru</h3>
                <button class="modal-close" onclick="closeModal('addTenantModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addTenantForm">
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama penghuni" required>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">No. WhatsApp</label>
                        <input type="tel" class="form-control" placeholder="0812xxxxxxx" required>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Kamar</label>
                        <select class="form-control" required>
                            <option value="">Pilih Kamar</option>
                            <option value="101">Kamar 101 - Standard</option>
                            <option value="102">Kamar 102 - Deluxe</option>
                            <option value="103">Kamar 103 - VIP</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Tanggal Masuk</label>
                        <input type="date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; padding: 0.8rem; margin-top: 1rem;">
                        <i class="fas fa-user-plus"></i> Tambah Penghuni
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Notifications Modal -->
    <div class="modal" id="notificationsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Notifikasi</h3>
                <button class="modal-close" onclick="closeModal('notificationsModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="activity-item">
                    <div class="activity-icon" style="background: #ff6b6b; color: white;">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Pembayaran terlambat - Kamar 101</div>
                        <div class="activity-time">2 hari yang lalu</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon" style="background: #4ecdc4; color: white;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Booking baru diterima</div>
                        <div class="activity-time">Hari ini, 10:30</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon" style="background: #ffd166; color: white;">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Perlu perbaikan - Kamar 205</div>
                        <div class="activity-time">Kemarin, 15:45</div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 1rem;">
                    <a href="#" style="color: var(--primary); text-decoration: none;">Tandai semua telah dibaca</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            initCharts();
            setupEventListeners();
        });

        // Revenue Chart
        function initCharts() {
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Pendapatan (Juta Rp)',
                        data: [12.5, 13.2, 14.1, 14.8, 15.2, 16.5],
                        borderColor: '#00a859',
                        backgroundColor: 'rgba(0, 168, 89, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value + 'Jt';
                                }
                            }
                        }
                    }
                }
            });

            // Room Status Chart
            const roomCtx = document.getElementById('roomStatusChart').getContext('2d');
            new Chart(roomCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Terisi', 'Kosong', 'Perbaikan'],
                    datasets: [{
                        data: [18, 6, 2],
                        backgroundColor: [
                            '#00a859',
                            '#7b61ff',
                            '#ff7a00'
                        ],
                        borderWidth: 1,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    },
                    cutout: '70%'
                }
            });
        }

        // Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleIcon = document.querySelector('.sidebar-toggle i');

            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');

            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.className = 'fas fa-chevron-right';
            } else {
                toggleIcon.className = 'fas fa-chevron-left';
            }
        }

        // Mobile Sidebar Toggle
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Modal Functions
        function openModal(modalType) {
            let modalId;
            switch(modalType) {
                case 'addRoom':
                    modalId = 'addRoomModal';
                    break;
                case 'addTenant':
                    modalId = 'addTenantModal';
                    break;
                case 'addPayment':
                    modalId = 'addPaymentModal';
                    break;
            }

            if (modalId) {
                document.getElementById(modalId).style.display = 'flex';
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Show Notifications
        function showNotifications() {
            document.getElementById('notificationsModal').style.display = 'flex';
        }

        // Toggle User Menu
        function toggleUserMenu() {
            // In real app, show dropdown menu
            alert('Menu pengguna akan ditampilkan di sini');
        }

        // Logout Function
        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                // In real app, call logout API
                window.location.href = 'login.html';
            }
        }

        // Generate Report
        function generateReport() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                alert('Laporan berhasil digenerate!');
                // In real app, download report
            }, 1500);
        }

        // Loading Functions
        function showLoading() {
            // Show loading overlay
            console.log('Loading...');
        }

        function hideLoading() {
            // Hide loading overlay
            console.log('Loading complete');
        }

        // Setup Event Listeners
        function setupEventListeners() {
            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });

            // Handle form submissions
            document.getElementById('addRoomForm')?.addEventListener('submit', function(e) {
                e.preventDefault();
                closeModal('addRoomModal');
                alert('Kamar berhasil ditambahkan!');
                // In real app, submit form data
            });

            document.getElementById('addTenantForm')?.addEventListener('submit', function(e) {
                e.preventDefault();
                closeModal('addTenantModal');
                alert('Penghuni berhasil ditambahkan!');
                // In real app, submit form data
            });

            // Search functionality
            const searchInput = document.querySelector('.search-input');
            searchInput?.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    alert('Mencari: ' + this.value);
                    // In real app, implement search
                }
            });
        }

        // Keyboard Shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + K for search
            if (e.ctrlKey && e.key === 'k') {
                e.preventDefault();
                document.querySelector('.search-input')?.focus();
            }

            // Esc to close modals
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => {
                    if (modal.style.display === 'flex') {
                        modal.style.display = 'none';
                    }
                });
            }
        });

        // Responsive sidebar on mobile
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 1024) {
                document.getElementById('sidebar').classList.remove('collapsed');
                document.getElementById('mainContent').classList.remove('expanded');
            }
        });
    </script>
</body>
</html>
