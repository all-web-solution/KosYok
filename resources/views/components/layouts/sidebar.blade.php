<aside class="livewire-sidebar" id="sidebar" :class="mobileSidebarActive ? 'active' : ''">
    <div class="sidebar-brand">
        <div class="brand-logo">
            <i class="fas fa-home"></i>
        </div>
        <div class="brand-text">
            Kos Melati Indah
        </div>
    </div>

    <nav class="nav-menu">
        <div class="nav-section">NAVIGASI UTAMA</div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('dashboard') }}" class="nav-link active">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>

        <div class="nav-section">MANAJEMEN</div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('admin.kamar') }}" class="nav-link">
                <i class="fas fa-bed nav-icon"></i>
                <span class="nav-label">Kamar</span>
                <span class="nav-badge" x-text="roomCount"></span>
            </a>
        </div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('admin.bookings') }}" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
                <span class="nav-label">Pemesanan</span>
                <span class="nav-badge" x-text="bookingCount"></span>
            </a>
        </div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('admin.users') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <span class="nav-label">Pengguna</span>
                <span class="nav-badge" x-text="userCount"></span>
            </a>
        </div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('admin.payments') }}" class="nav-link">
                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                <span class="nav-label">Pembayaran</span>
                <span class="nav-badge" x-text="pendingPayments"></span>
            </a>
        </div>

        <div class="nav-section">LAINNYA</div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('admin.settings') }}" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <span class="nav-label">Pengaturan</span>
            </a>
        </div>
        <div class="nav-item">
            <a wire:navigate href="{{ route('admin.reports') }}" class="nav-link">
                <i class="fas fa-chart-bar nav-icon"></i>
                <span class="nav-label">Laporan</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-question-circle nav-icon"></i>
                <span class="nav-label">Bantuan</span>
            </a>
        </div>

        <div class="sidebar-divider"></div>

    </nav>
</aside>
