<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    /**
     * Nama primary key.
     *
     * @var string
     */
    protected $primaryKey = 'booking_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'package_id',
        'booking_date',
        'pax',
        'start_date',
        'end_date',
        'total_price',
        'currency_id',
        'status', // Pastikan kolom status ada di migrasi Anda
    ];

    /**
     * Relasi ke model Customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Relasi ke model TourPackage.
     */
    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class, 'package_id');
    }

    /**
     * Relasi ke model GuideAssignment.
     * Sebuah booking bisa memiliki banyak permintaan assignment (jika beberapa guide request).
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(GuideAssignment::class, 'booking_id');
    }
}
