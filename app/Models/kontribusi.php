<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontribusi extends Model
{
    use HasFactory;

    protected $table = 'kontribusi';
    
    protected $fillable = [
        'kategori',
        'contoh_barang',
        'cara_pemilahan', 
        'tempat_pembuangan'
    ];
    
    protected $casts = [
        'cara_pemilahan' => 'array'
    ];
}