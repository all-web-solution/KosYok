<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kamars = [
            [
                'nomor_kamar' => 'A101',
                'nama_kamar' => 'Kamar Standard A',
                'deskripsi' => 'Kamar nyaman dengan ukuran standar, cocok untuk mahasiswa',
                'fasilitas' => 'Kamar tidur, AC, WiFi, lemari, meja belajar, kamar mandi dalam',
                'harga_3bulan' => 4500000.00,
                'harga_6bulan' => 8500000.00,
                'harga_1tahun' => 16000000.00,
                'status' => 'available',
                'foto' => 'kamar-a101.jpg',
            ],
            [
                'nomor_kamar' => 'A102',
                'nama_kamar' => 'Kamar Deluxe',
                'deskripsi' => 'Kamar lebih luas dengan view yang bagus',
                'fasilitas' => 'Kamar tidur, AC, WiFi, lemari, meja belajar, kamar mandi dalam, kulkas mini',
                'harga_3bulan' => 5500000.00,
                'harga_6bulan' => 10500000.00,
                'harga_1tahun' => 20000000.00,
                'status' => 'occupied',
                'foto' => 'kamar-a102.jpg',
            ],
            [
                'nomor_kamar' => 'A103',
                'nama_kamar' => 'Kamar Premium',
                'deskripsi' => 'Kamar premium dengan fasilitas lengkap',
                'fasilitas' => 'Kamar tidur queen size, AC, WiFi, lemari besar, meja belajar, kamar mandi dalam dengan shower air panas, kulkas, TV',
                'harga_3bulan' => 6500000.00,
                'harga_6bulan' => 12500000.00,
                'harga_1tahun' => 24000000.00,
                'status' => 'available',
                'foto' => 'kamar-a103.jpg',
            ],
            [
                'nomor_kamar' => 'B101',
                'nama_kamar' => 'Kamar Ekonomis',
                'deskripsi' => 'Kamar hemat dengan fasilitas dasar',
                'fasilitas' => 'Kamar tidur, kipas angin, WiFi, lemari, meja belajar, kamar mandi bersama',
                'harga_3bulan' => 3500000.00,
                'harga_6bulan' => 6500000.00,
                'harga_1tahun' => 12000000.00,
                'status' => 'available',
                'foto' => 'kamar-b101.jpg',
            ],
            [
                'nomor_kamar' => 'B102',
                'nama_kamar' => 'Kamar Twin Bed',
                'deskripsi' => 'Kamar dengan dua tempat tidur, cocok untuk teman sekamar',
                'fasilitas' => '2 tempat tidur, AC, WiFi, 2 lemari, 2 meja belajar, kamar mandi dalam',
                'harga_3bulan' => 7500000.00,
                'harga_6bulan' => 14500000.00,
                'harga_1tahun' => 28000000.00,
                'status' => 'maintenance',
                'foto' => 'kamar-b102.jpg',
            ],
            [
                'nomor_kamar' => 'C101',
                'nama_kamar' => 'Kamar Corner View',
                'deskripsi' => 'Kamar dengan view kota dari sudut bangunan',
                'fasilitas' => 'Kamar tidur king size, AC, WiFi premium, lemari walk-in, meja kerja ergonomis, kamar mandi dengan bathtub, kulkas, TV 32", coffee maker',
                'harga_3bulan' => 8500000.00,
                'harga_6bulan' => 16500000.00,
                'harga_1tahun' => 32000000.00,
                'status' => 'available',
                'foto' => 'kamar-c101.jpg',
            ],
            [
                'nomor_kamar' => 'C102',
                'nama_kamar' => 'Kamar Executive',
                'deskripsi' => 'Kamar khusus eksekutif dengan privasi maksimal',
                'fasilitas' => 'Kamar tidur king size, AC, WiFi premium, lemari besi, meja kerja luas, kamar mandi dengan sauna mini, kitchenette, smart TV 40", setrika',
                'harga_3bulan' => 9500000.00,
                'harga_6bulan' => 18500000.00,
                'harga_1tahun' => 36000000.00,
                'status' => 'occupied',
                'foto' => 'kamar-c102.jpg',
            ],
            [
                'nomor_kamar' => 'D101',
                'nama_kamar' => 'Kamar Studio',
                'deskripsi' => 'Kamar studio dengan area living terintegrasi',
                'fasilitas' => 'Area tidur dan living, AC, WiFi, lemari pakaian, meja makan kecil, dapur mini, kamar mandi, TV',
                'harga_3bulan' => 7000000.00,
                'harga_6bulan' => 13500000.00,
                'harga_1tahun' => 26000000.00,
                'status' => 'available',
                'foto' => 'kamar-d101.jpg',
            ],
        ];

        foreach ($kamars as $kamar) {
            DB::table('kamars')->insert([
                'nomor_kamar' => $kamar['nomor_kamar'],
                'nama_kamar' => $kamar['nama_kamar'],
                'deskripsi' => $kamar['deskripsi'],
                'fasilitas' => $kamar['fasilitas'],
                'harga_3bulan' => $kamar['harga_3bulan'],
                'harga_6bulan' => $kamar['harga_6bulan'],
                'harga_1tahun' => $kamar['harga_1tahun'],
                'status' => $kamar['status'],
                'foto' => $kamar['foto'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
