<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Beritahu Laravel nama primary key yang benar
    protected $primaryKey = 'customer_id';

    // Definisikan kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nationality',
    ];

    // Definisikan relasi ke model Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }
}
