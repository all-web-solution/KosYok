<?php

namespace App\Livewire\Admin;

use App\Models\Kamar;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KamarManagement extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $number = '';
    public $status = '';
    public $facility = '';
    public $harga3bulan = '';
    public $harga6bulan = '';
    public $harga1tahun = '';
    public $image;
    public $description = '';

    protected $rules = [
        'number' => 'required|string|max:50',
        'name' => 'required|string|max:100',
        'status' => 'required',
        'facility' => 'required|string',
        'harga3bulan' => 'required|numeric',
        'harga6bulan' => 'nullable|numeric',
        'harga1tahun' => 'nullable|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        return view('livewire.admin.kamar-management', [
            'kamars' => Kamar::latest()->paginate(10),
        ]);
    }

    public function createNewRoom()
    {
        dd($this->all());
    }
}
