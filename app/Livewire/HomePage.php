<?php
// app/Livewire/HomePage.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Kamar;

class HomePage extends Component
{
    public $kamarTersedia;
    public $promosi = [
        [
            'title' => 'Promo Awal Tahun',
            'description' => 'Diskon 10% untuk booking 1 tahun',
            'icon' => '🎉',
            'color' => 'bg-yellow-100'
        ],
        [
            'title' => 'Gratis WiFi',
            'description' => 'Internet cepat 100 Mbps',
            'icon' => '📶',
            'color' => 'bg-blue-100'
        ],
        [
            'title' => 'Fasilitas Lengkap',
            'description' => 'AC, Kamar mandi dalam, TV',
            'icon' => '⭐',
            'color' => 'bg-green-100'
        ]
    ];

    public $fasilitas = [
        ['icon' => '🛏️', 'name' => 'Kasur Nyaman', 'desc' => 'Spring bed premium'],
        ['icon' => '🚿', 'name' => 'Kamar Mandi', 'desc' => 'Dalam & air panas'],
        ['icon' => '📺', 'name' => 'TV LED', 'desc' => '32 inch dengan channel lengkap'],
        ['icon' => '❄️', 'name' => 'AC', 'desc' => 'Dingin sepanjang hari'],
        ['icon' => '🧺', 'name' => 'Laundry', 'desc' => 'Gratis 2x seminggu'],
        ['icon' => '🅿️', 'name' => 'Parkir', 'desc' => 'Area parkir aman'],
    ];

    public function mount()
    {
        // Ambil kamar yang available
        $this->kamarTersedia = Kamar::where('status', 'available')->take(6)->get();
    }

    public function render()
    {
        return view('livewire.home-page')
            ->layout('layouts.guest');
    }
}
