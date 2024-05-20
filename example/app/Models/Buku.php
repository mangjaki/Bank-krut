<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'pengarang', 'penerbit', 'tahun_terbit'
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
