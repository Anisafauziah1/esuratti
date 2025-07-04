<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratType extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'template_view',
        'persyaratan',
    ];

    protected $casts = [
        'persyaratan' => 'array', // otomatis decode JSON ke array
    ];

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
