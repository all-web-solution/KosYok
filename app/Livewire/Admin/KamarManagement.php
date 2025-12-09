<?php

namespace App\Livewire\Admin;

use App\Models\Kamar;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KamarManagement extends Component
{
    use WithFileUploads;
    public $name;
    public $number;
    public $status;
    public $facility;
    public $harga3bulan;
    public $harga6bulan;
    public $harga1tahun;
    public $image;
    public $description;
    public $showModal = false;

public function openModal()
{
    $this->showModal = true;
}

public function closeModal()
{
    $this->showModal = false;
}
    public function render()
    {
        return view('livewire.admin.kamar-management',[
            'kamars' => Kamar::latest()->paginate(10)
        ]);
    }

    public function store()
{
    // $this->validate();

    // $imagePath = null;
    // if ($this->image) {
    //     $imagePath = $this->image->store('kamar', 'public');
    // }

    // Kamar::create([
    //     'nomor_kamar' => $this->number,
    //     'nama_kamar' => $this->name,
    //     'status' => $this->status,
    //     'fasilitas' => $this->facility,
    //     'harga_3bulan' => $this->harga3bulan,
    //     'harga_6bulan' => $this->harga6bulan,
    //     'harga_1tahun' => $this->harga1tahun,
    //     'foto' => $imagePath,
    //     'deskripsi' => $this->description,
    // ]);

    // $this->reset();
    // $this->dispatch('close-modal');

    dd("masuk store");
}

}
