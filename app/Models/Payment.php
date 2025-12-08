<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'booking_id',
        'metode_bayar',
        'jumlah',
        'bukti_bayar',
        'status',
        'catatan_admin',
        'tanggal_bayar',
        'confirmed_by'
    ];

    protected $casts = [
        'tanggal_bayar' => 'datetime',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function confirmedBy()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }
}
