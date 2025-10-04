<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuideAssignment extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'assignment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'guide_id',
        'assigned_date',
        'status',
    ];

    /**
     * Mendapatkan data guide yang terkait dengan assignment ini.
     */
    public function guide(): BelongsTo
    {
        return $this->belongsTo(Guide::class, 'guide_id');
    }

    /**
     * Mendapatkan data booking yang terkait dengan assignment ini.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
