<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'merek',
        'model',
        'nomor_plat',
        'foto',
        'jumlah',
        'harga',
        'user_id',
    ];
    
}
