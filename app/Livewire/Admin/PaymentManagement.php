<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'all';
    public $perPage = 10;
    public $showModal = false;
    public $selectedPayment;
    public $catatan_admin;

    public function mount()
    {
        $this->resetPage();
    }

    public function viewPayment($id)
    {
        $this->selectedPayment = Payment::with(['booking', 'booking.customer', 'booking.kamar', 'confirmedBy'])
            ->findOrFail($id);
        $this->showModal = true;
    }

    public function confirmPayment($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => 'confirmed',
            'tanggal_bayar' => now(),
            'confirmed_by' => Auth::id(),
            'catatan_admin' => $this->catatan_admin
        ]);

        // Update booking status
        $payment->booking->update(['status' => 'confirmed']);

        // Update kamar status
        $payment->booking->kamar->update(['status' => 'occupied']);

        // Calculate checkout date
        $durationDays = [
            '3bulan' => 90,
            '6bulan' => 180,
            '1tahun' => 365,
        ];

        $tanggalKeluar = $payment->booking->tanggal_masuk->addDays(
            $durationDays[$payment->booking->durasi]
        );

        $payment->booking->update(['tanggal_keluar' => $tanggalKeluar]);

        $this->showModal = false;
        $this->catatan_admin = '';

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Pembayaran berhasil dikonfirmasi!'
        ]);
    }

    public function rejectPayment($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => 'rejected',
            'catatan_admin' => $this->catatan_admin
        ]);

        $this->showModal = false;
        $this->catatan_admin = '';

        $this->dispatchBrowserEvent('show-notification', [
            'type' => 'success',
            'message' => 'Pembayaran ditolak!'
        ]);
    }

    public function getPaymentsProperty()
    {
        return Payment::with(['booking', 'booking.customer', 'booking.kamar'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('booking', function ($q2) {
                        $q2->where('kode_booking', 'like', '%' . $this->search . '%')
                            ->orWhereHas('customer', function ($q3) {
                                $q3->where('nama', 'like', '%' . $this->search . '%');
                            });
                    });
                });
            })
            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    public function getStatsProperty()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        return [
            'pending' => Payment::where('status', 'pending')->count(),
            'confirmed' => Payment::where('status', 'confirmed')->count(),
            'rejected' => Payment::where('status', 'rejected')->count(),
            'total_this_month' => Payment::where('status', 'confirmed')
                ->whereMonth('tanggal_bayar', $currentMonth)
                ->whereYear('tanggal_bayar', $currentYear)
                ->sum('jumlah'),
        ];
    }

    public function render()
    {
        return view('livewire.admin.payment-management', [
            'payments' => $this->payments,
            'stats' => $this->stats
        ]);
    }
}
