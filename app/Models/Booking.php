<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'kode_booking',
        'customer_id',
        'kamar_id',
        'durasi',
        'tanggal_masuk',
        'tanggal_keluar',
        'total_harga',
        'status'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function checkinLogs()
    {
        return $this->hasMany(CheckinLog::class);
    }

    public function getHariTinggalAttribute()
    {
        if ($this->tanggal_masuk) {
            return now()->diffInDays($this->tanggal_masuk) + 1;
        }
        return 0;
    }

    public function getSisaHariAttribute()
    {
        if ($this->tanggal_keluar) {
            return now()->diffInDays($this->tanggal_keluar);
        }
        return 0;
    }
}
