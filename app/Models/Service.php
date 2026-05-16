<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan model ini.
     * Laravel secara default sudah menebak 'services', tapi kita tulis
     * eksplisit agar tidak ambigu.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * Kolom-kolom yang boleh diisi secara mass assignment
     * (misalnya lewat Service::create([...]) atau $service->fill([...])).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'price',
        'category',
    ];

    /**
     * Cast tipe data kolom secara otomatis.
     * 'price' di-cast ke float agar bisa langsung dihitung
     * tanpa perlu konversi manual.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float',
    ];
}