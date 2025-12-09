<?php

use App\Http\Controllers\Guest;
use App\Livewire\Admin\BookingManagement;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\Admin\KamarManagement;
use App\Livewire\Admin\PaymentManagement;
use App\Livewire\Admin\UserManagement;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', [Guest::class, 'welcome'])->name('welcome');

// Rute untuk user yang terautentikasi
Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');

    // Dashboard umum berdasarkan role
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

    })->name('dashboard');
});

// Rute admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('/kamar', KamarManagement::class)->name('kamar');
    Route::get('/bookings', BookingManagement::class)->name('bookings');
    Route::get('/payments', PaymentManagement::class)->name('payments');
    Route::get('/users', UserManagement::class)->name('users');
    // Reports
    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('reports');
    // Settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});

require __DIR__ . '/auth.php';
