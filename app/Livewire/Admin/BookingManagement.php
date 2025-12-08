<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'all';
    public $perPage = 10;
    public $showDetailModal = false;
    public $selectedBooking;
    public $selectedKamarId;

    public function mount()
    {
        $this->resetPage();
    }

    public function viewDetails($id)
    {
        $this->selectedBooking = Booking::with(['customer', 'kamar', 'payment'])
            ->findOrFail($id);
        $this->showDetailModal = true;
    }

    public function updateStatus($id, $status)
    {
        $booking = Booking::findOrFail($id);

        // Update booking status
        $booking->update(['status' => $status]);

        // Update kamar status if needed
        if (in_array($status, ['confirmed', 'checkin'])) {
            $booking->kamar->update(['status' => 'occupied']);
        } elseif ($status === 'checkout' || $status === 'cancelled') {
            $booking->kamar->update(['status' => 'available']);
        }

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Status booking berhasil diperbarui!'
        ]);
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'confirmed') {
            // Refund logic here if needed
        }

        $booking->update([
            'status' => 'cancelled',
            'tanggal_keluar' => now()
        ]);

        $booking->kamar->update(['status' => 'available']);

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Booking berhasil dibatalkan!'
        ]);
    }

    public function checkinBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update(['status' => 'checkin']);
        $booking->kamar->update(['status' => 'occupied']);

        // Create checkin log
        $booking->checkinLogs()->create([
            'tanggal_checkin' => now()->format('Y-m-d'),
            'hari_ke' => 1
        ]);

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Check-in berhasil dicatat!'
        ]);
    }

    public function checkoutBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'checkout',
            'tanggal_keluar' => now()
        ]);

        $booking->kamar->update(['status' => 'available']);

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Check-out berhasil dicatat!'
        ]);
    }

    public function getBookingsProperty()
    {
        return Booking::with(['customer', 'kamar', 'payment'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('kode_booking', 'like', '%' . $this->search . '%')
                        ->orWhereHas('customer', function ($q2) {
                            $q2->where('nama', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('kamar', function ($q2) {
                            $q2->where('nomor_kamar', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.booking-management', [
            'bookings' => $this->bookings,
            'stats' => [
                'total' => Booking::count(),
                'pending' => Booking::where('status', 'pending')->count(),
                'confirmed' => Booking::where('status', 'confirmed')->count(),
                'checkin' => Booking::where('status', 'checkin')->count(),
                'checkout' => Booking::where('status', 'checkout')->count(),
                'cancelled' => Booking::where('status', 'cancelled')->count(),
            ]
        ]);
    }
}
