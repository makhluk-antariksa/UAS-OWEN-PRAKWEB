<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    use HasFactory;
    protected $fillable = ['tanaman_id', 'tanggal_perawatan', 'jenis_perawatan', 'catatan'];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
} 