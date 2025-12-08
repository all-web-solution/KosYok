<?php

namespace App\Livewire\Admin;

use App\Models\Kamar;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KamarManagement extends Component
{
    public function render()
    {
        return view('livewire.admin.kamar-management');
    }
}
