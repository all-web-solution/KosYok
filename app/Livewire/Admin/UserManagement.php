<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = 'all';
    public $statusFilter = 'all';
    public $perPage = 10;
    public $showModal = false;
    public $selectedUser;

    public function mount()
    {
        $this->resetPage();
    }

    public function viewUser($id)
    {
        $this->selectedUser = User::with(['bookings', 'bookings.kamar'])
            ->findOrFail($id);
        $this->showModal = true;
    }

    public function updateStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => $status]);

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Status user berhasil diperbarui!'
        ]);
    }

    public function updateRole($id, $role)
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $role]);

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Role user berhasil diperbarui!'
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting self
        if ($user->id === Auth::id()) {
            $this->dispatchBrowserEvent('show-notification', [
                'type' => 'error',
                'message' => 'Tidak bisa menghapus akun sendiri!'
            ]);
            return;
        }

        // Check if user has active bookings
        if ($user->bookings()->whereIn('status', ['confirmed', 'checkin'])->exists()) {
            $this->dispatchBrowserEvent('show-notification', [
                'type' => 'error',
                'message' => 'Tidak bisa menghapus user yang memiliki booking aktif!'
            ]);
            return;
        }

        $user->delete();

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'User berhasil dihapus!'
        ]);
    }

    public function getUsersProperty()
    {
        return User::when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('telepon', 'like', '%' . $this->search . '%');
            });
        })
            ->when($this->roleFilter !== 'all', function ($query) {
                $query->where('role', $this->roleFilter);
            })
            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    public function getStatsProperty()
    {
        return [
            'total' => User::count(),
            'customer' => User::where('role', 'customer')->count(),
            'admin' => User::where('role', 'admin')->count(),
            'owner' => User::where('role', 'owner')->count(),
            'active' => User::where('status', 'active')->count(),
            'pending' => User::where('status', 'pending')->count(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.user-management', [
            'users' => $this->users,
            'stats' => $this->stats
        ]);
    }
}
