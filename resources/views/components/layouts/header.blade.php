<header class="livewire-header">
    <div class="page-title">
        <button class="mobile-menu-toggle d-md-none" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <h1>Dashboard Admin</h1>
            <div class="page-subtitle">Selamat datang kembali, Admin!</div>
        </div>
    </div>
    
    <div class="header-tools">
        <div class="livewire-search d-none d-md-block">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari..." id="searchInput">
        </div>
        
        <button class="mobile-menu-toggle d-md-none" id="mobileSearchToggle">
            <i class="fas fa-search"></i>
        </button>
        
        <div class="notification-wrapper">
            <button class="notification-btn" id="notificationBtn">
                <i class="fas fa-bell"></i>
            </button>
            <div class="notification-indicator" id="notificationIndicator"></div>
        </div>
        
        <div class="user-dropdown">
            <button class="user-btn" id="userDropdownToggle">
                <div class="user-avatar">
                    A
                </div>
                <div class="user-info d-none d-md-block">
                    <div class="user-name">Admin Kos</div>
                    <div class="user-role">Super Admin</div>
                </div>
                <i class="fas fa-chevron-down" id="dropdownArrow"></i>
            </button>
            
            <!-- Dropdown Menu -->
            <div class="dropdown-menu" id="userDropdownMenu">
                <div class="dropdown-header">
                    <div class="dropdown-user-info">
                        <div class="dropdown-user-avatar">A</div>
                        <div>
                            <div class="dropdown-user-name">Admin Kos</div>
                            <div class="dropdown-user-email">admin@kosmelati.com</div>
                        </div>
                    </div>
                </div>
                
                <div class="dropdown-divider"></div>
                
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user dropdown-icon"></i>
                    <span>Profil Saya</span>
                </a>
                
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog dropdown-icon"></i>
                    <span>Pengaturan</span>
                </a>
                
                <a href="#" class="dropdown-item">
                    <i class="fas fa-question-circle dropdown-icon"></i>
                    <span>Bantuan</span>
                </a>
                
                <div class="dropdown-divider"></div>
                
                <button class="dropdown-item logout-item" id="logoutBtn">
                    <i class="fas fa-sign-out-alt dropdown-icon"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </div>
    </div>
</header>

<style>
    /* User Dropdown Styles */
.user-dropdown {
    position: relative;
}

.dropdown-menu {
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    width: 280px;
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    border: 1px solid var(--gray-light);
    z-index: 1000;
    overflow: hidden;
    display: none;
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.2s ease, transform 0.2s ease;
}

.dropdown-menu.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.dropdown-header {
    padding: 1.25rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-bottom: 1px solid var(--gray-light);
}

.dropdown-user-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.dropdown-user-avatar {
    width: 44px;
    height: 44px;
    background: var(--primary-gradient);
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    flex-shrink: 0;
}

.dropdown-user-name {
    font-weight: 600;
    color: var(--dark);
    font-size: 0.95rem;
}

.dropdown-user-email {
    font-size: 0.8rem;
    color: var(--gray);
    margin-top: 0.15rem;
}

.dropdown-divider {
    height: 1px;
    background: var(--gray-light);
    margin: 0.5rem 0;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1.25rem;
    color: var(--dark);
    text-decoration: none;
    transition: all var(--transition-fast);
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    font-size: 0.9rem;
}

.dropdown-item:hover {
    background: var(--primary-light);
    color: var(--primary);
}

.dropdown-icon {
    width: 20px;
    text-align: center;
    color: var(--gray);
    font-size: 0.95rem;
}

.dropdown-item:hover .dropdown-icon {
    color: var(--primary);
}

.logout-item {
    color: #ef4444;
}

.logout-item:hover {
    background: #fee2e2;
    color: #dc2626;
}

.logout-item:hover .dropdown-icon {
    color: #dc2626;
}

.rotate-180 {
    transform: rotate(180deg);
    transition: transform 0.3s ease;
}

/* Responsive dropdown */
@media (max-width: 768px) {
    .dropdown-menu {
        width: 250px;
        right: -10px;
    }
    
    .dropdown-header {
        padding: 1rem;
    }
    
    .dropdown-user-avatar {
        width: 40px;
        height: 40px;
    }
    
    .dropdown-item {
        padding: 0.75rem 1rem;
    }
}

@media (max-width: 480px) {
    .dropdown-menu {
        width: 220px;
    }
}
</style>
<script>
    // User Dropdown Functionality
document.addEventListener('DOMContentLoaded', function() {
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    const dropdownArrow = document.getElementById('dropdownArrow');
    const logoutBtn = document.getElementById('logoutBtn');
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileSearchToggle = document.getElementById('mobileSearchToggle');
    const notificationBtn = document.getElementById('notificationBtn');
    const searchInput = document.getElementById('searchInput');
    const notificationIndicator = document.getElementById('notificationIndicator');
    
    let dropdownOpen = false;
    
    // Toggle dropdown menu
    function toggleDropdown() {
        dropdownOpen = !dropdownOpen;
        
        if (dropdownOpen) {
            userDropdownMenu.classList.add('show');
            dropdownArrow.classList.add('rotate-180');
        } else {
            userDropdownMenu.classList.remove('show');
            dropdownArrow.classList.remove('rotate-180');
        }
    }
    
    // Close dropdown
    function closeDropdown() {
        dropdownOpen = false;
        userDropdownMenu.classList.remove('show');
        dropdownArrow.classList.remove('rotate-180');
    }
    
    // Toggle dropdown on button click
    userDropdownToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleDropdown();
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!userDropdownToggle.contains(e.target) && !userDropdownMenu.contains(e.target)) {
            closeDropdown();
        }
    });
    
    // Close dropdown on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && dropdownOpen) {
            closeDropdown();
        }
    });
    
    // Logout functionality
    logoutBtn.addEventListener('click', function() {
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            showLoading();
            setTimeout(function() {
                hideLoading();
                alert('Anda telah berhasil logout');
                // Redirect ke halaman login
                window.location.href = '/';
            }, 1000);
        }
    });
    
    // Mobile menu toggle
    mobileMenuToggle.addEventListener('click', function() {
        toggleMobileSidebar();
    });
    
    // Mobile search toggle
    mobileSearchToggle.addEventListener('click', function() {
        openMobileSearch();
    });
    
    // Notification button
    notificationBtn.addEventListener('click', function() {
        showNotifications();
    });
    
    // Search input enter key
    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                performSearch(this.value);
            }
        });
    }
    
    // Notification indicator - update based on unread notifications
    function updateNotificationIndicator(count) {
        if (count > 0) {
            notificationIndicator.style.display = 'block';
            notificationBtn.setAttribute('data-count', count);
        } else {
            notificationIndicator.style.display = 'none';
            notificationBtn.removeAttribute('data-count');
        }
    }
    
    // Initialize with 3 unread notifications
    updateNotificationIndicator(3);
});

// Helper functions (sama dengan yang sebelumnya)
function showLoading() {
    document.getElementById('loadingOverlay').style.display = 'flex';
}

function hideLoading() {
    document.getElementById('loadingOverlay').style.display = 'none';
}

function toggleMobileSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const isActive = sidebar.classList.contains('active');
    
    if (isActive) {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    } else {
        sidebar.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function openMobileSearch() {
    const modal = document.getElementById('mobileSearchModal');
    modal.style.display = 'flex';
}

function showNotifications() {
    const modal = document.getElementById('notificationsModal');
    modal.style.display = 'flex';
}

function performSearch(query) {
    if (query.trim()) {
        showLoading();
        setTimeout(function() {
            hideLoading();
            const mobileSearchModal = document.getElementById('mobileSearchModal');
            if (mobileSearchModal) {
                mobileSearchModal.style.display = 'none';
            }
            alert('Mencari: ' + query);
        }, 500);
    }
}

// Close modal function
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

// Close all modals on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modals = document.querySelectorAll('.livewire-modal');
        modals.forEach(function(modal) {
            modal.style.display = 'none';
        });
        
        // Also close dropdown if open
        const dropdown = document.getElementById('userDropdownMenu');
        if (dropdown && dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
            document.getElementById('dropdownArrow').classList.remove('rotate-180');
        }
    }
});

// Close modal when clicking outside
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('livewire-modal')) {
        e.target.style.display = 'none';
    }
});
</script>