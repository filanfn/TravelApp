<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $primaryKey = 'guide_id'; // ganti sesuai nama kolom primary key
    public $incrementing = true;        // set false kalau bukan auto increment
    protected $keyType = 'int';         // set 'string' kalau tipe datanya varchar
    protected $fillable = [
        'name',   // tambahkan ini
        'email',
        'phone',
        'address'
    ];
    // Sebuah profil guide dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
