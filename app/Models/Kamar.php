<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'nama_kamar',
        'deskripsi',
        'fasilitas',
        'harga_3bulan',
        'harga_6bulan',
        'harga_1tahun',
        'status',
        'foto'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function activeBooking()
    {
        return $this->bookings()
            ->whereIn('status', ['confirmed', 'checkin'])
            ->latest()
            ->first();
    }

    public function getFasilitasArrayAttribute()
    {
        return $this->fasilitas ? explode(', ', $this->fasilitas) : [];
    }
    public static function formatHarga($harga)
    {
        return 'Rp ' . number_format($harga, 0, ',', '.');
    }
}
