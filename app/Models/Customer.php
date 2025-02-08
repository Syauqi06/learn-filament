<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'id_customer',
        'nama_customer',
        'kode_customer',
        'alamat_customer',
        'no_customer',
    ];
}
