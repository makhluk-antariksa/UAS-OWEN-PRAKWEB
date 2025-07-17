<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;

    // Tambahkan ini:
    protected $table = 'tanamans';
    protected $fillable = ['nama_tanaman', 'kategori_id', 'deskripsi', 'gambar', 'tanggal_tanam', 'lokasi'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
