<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    // Beritahu Laravel nama primary key yang benar
    protected $primaryKey = 'package_id';

    // Definisikan kolom yang boleh diisi
    protected $fillable = [
        'title',
        'destination_id',
        'description',
        // ... kolom lainnya
    ];

    // Definisikan relasi ke model Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
