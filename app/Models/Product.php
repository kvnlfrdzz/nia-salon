<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan model ini.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Kolom-kolom yang boleh diisi secara mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image_path',
        'price',
    ];

    /**
     * Cast tipe data kolom secara otomatis.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float',
    ];
}