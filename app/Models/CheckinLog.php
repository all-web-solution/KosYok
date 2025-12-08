<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckinLog extends Model
{
    protected $table = 'checkin_log';

    protected $fillable = [
        'booking_id',
        'tanggal_checkin',
        'hari_ke'
    ];

    protected $casts = [
        'tanggal_checkin' => 'date',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
