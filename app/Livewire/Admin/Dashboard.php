<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\Kamar;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
