<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPersyaratan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_id',
        'nama_syarat',
        'type',
        'isian',
        'file_path',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
