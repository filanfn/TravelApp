<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $primaryKey = 'package_id';

    protected $fillable = [
        'destination_id',
        'title',
        'max_pax',
        'description',
        'base_price',
        'duration_days',
        'status',
    ];

    // Relasi ke Destination
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'destination_id');
    }
}
