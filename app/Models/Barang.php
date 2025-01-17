<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    // protected $table = 'barang';
    // protected $primaryKey = 'id_barang';
    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'kode_barang',
        'harga_barang',
    ];
}
