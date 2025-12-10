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
    public function createNewRoom()
    {
        // 1. Validasi Input berdasarkan $rules yang sudah kamu buat
        $validatedData = $this->validate();

        // 2. Handle Upload Gambar (Jika ada)
        if ($this->image) {
            // Simpan ke folder 'storage/app/public/kamar-images'
            // Pastikan sudah menjalankan: php artisan storage:link
            $imagePath = $this->image->store('kamar-images', 'public');

            // Masukkan path gambar ke array data yang akan disimpan
            $validatedData['image'] = $imagePath;
        }

        // 3. Simpan ke Database
        Kamar::create($validatedData);

        // 4. Reset Form Input (Membersihkan field setelah simpan)
        $this->reset(['name', 'number', 'status', 'facility', 'harga3bulan', 'harga6bulan', 'harga1tahun', 'image', 'description']);

        // 5. Kirim pesan sukses (Optional, bisa ditampilkan di blade)
        session()->flash('message', 'Kamar berhasil ditambahkan!');

        // 6. Tutup Modal (Kirim sinyal ke JavaScript)
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.admin.kamar-management', [
            'kamars' => Kamar::latest()->paginate(10),
        ]);
    }

}
