<?php

namespace App\Livewire\Admin;

use App\Models\Kamar;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KamarManagement extends Component
{
    public $name;
    public $number;
    public $status;
    public $facility;
    public $harga3bulan;
    public $harga6bulan;
    public $harga1tahun;
    public $image;
    public $description;
    public function render()
    {
        return view('livewire.admin.kamar-management',[
            'kamars' => Kamar::latest()->paginate(10)
        ]);
    }

    public function store(){
        $validatedData = $this->validate([
            'number' => 'required|unique:kamars,nomor_kamar', // Pastikan 'kamars' nama tabel & 'nomor_kamar' nama kolom
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'facility' => 'required|string',
            'status' => 'required|in:tersedia,terisi,perbaikan', // Sesuaikan enum/pilihan status
            'harga3bulan' => 'required|numeric',
            'harga6bulan' => 'required|numeric',
            'harga1bulan' => 'required|numeric',
            'image' => 'required|image|max:2048', // Maksimal 2MB
        ], [
            // Custom Error Messages (Opsional)
            'number.unique' => 'Nomor kamar sudah terdaftar.',
            'image.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);
        $imagePath = null;
        if ($this->image) {
            // Gambar akan disimpan di storage/app/public/kamar-images
            $imagePath = $this->image->store('kamar-images', 'public');
        }
        Kamar::create([
        'nomor_kamar' => $this->number,
        'nama_kamar' => $this->name,
        'deskripsi' => $this->description,
        'fasilitas' => $this->facility,
        'harga_3bulan' => $this->harga3bulan,
        'harga_6bulan' => $this->harga6bulan,
        'harga_1tahun' => $this->harga1tahun,
        'status' => $this->status,
        'foto' => $imagePath
        ]);
        $this->reset();
        session()->flash('message', 'Data kamar berhasil ditambahkan.');
        $this->dispatch('close-modal');
    }
}
