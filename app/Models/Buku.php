<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model
     */
    protected $table = 'books';

    /**
     * Kolom yang dapat diisi (mass assignable)
     */
    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'tgl_terbit'
    ];

    /**
     * Kolom yang harus di-cast
     */
    protected $casts = [
        'tgl_terbit' => 'date',
        'harga' => 'integer'
    ];

    /**
     * Format tanggal untuk kolom timestamps
     */
    protected $dateFormat = 'Y-m-d H:i:s';
}
