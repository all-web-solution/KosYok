<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kos Melati Indah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981',
                        'primary-dark': '#059669',
                        secondary: '#3B82F6',
                        'secondary-dark': '#2563EB',
                    }
                }
            }
        }
    </script>
    @livewireStyles
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-gray-800 text-white min-h-screen fixed">
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-home text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Kos Melati</h2>
                        <p class="text-xs text-gray-400">Admin Panel</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-chart-bar w-5"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.kamars') }}"
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.kamars') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-door-closed w-5"></i>
                    <span>Kamar</span>
                </a>

                <a href="{{ route('admin.bookings') }}"
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.bookings') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-calendar-check w-5"></i>
                    <span>Booking</span>
                </a>

                <a href="{{ route('admin.payments') }}"
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.payments') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-wallet w-5"></i>
                    <span>Pembayaran</span>
                </a>

                <a href="{{ route('admin.users') }}"
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.users') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>User</span>
                </a>

                <a href="{{ route('admin.reports') }}"
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.reports') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-chart-pie w-5"></i>
                    <span>Laporan</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-full p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 w-full">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 p-6">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard Admin')</h1>
                <nav class="flex mt-2" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 hover:text-primary">
                                <i class="fas fa-home mr-2"></i>
                                Dashboard
                            </a>
                        </li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>

            <!-- Content -->
            @if(session()->has('message'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('message') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

           {{ $slot }}
        </main>
    </div>

    @livewireScripts
    <script>
        // Notification handler
        window.addEventListener('show-notification', event => {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${event.detail.type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${event.detail.type === 'success' ? 'check' : 'exclamation'}-circle mr-2"></i>
                    <span>${event.detail.message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        });
    </script>
    @stack('scripts')
</body>
</html>
