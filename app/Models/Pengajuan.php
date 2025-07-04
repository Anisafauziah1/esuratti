<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'surat_type_id',
        'status',
        'file_surat_pengantar',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suratType()
    {
        return $this->belongsTo(SuratType::class);
    }

    public function persyaratans()
    {
        return $this->hasMany(PengajuanPersyaratan::class);
    }

}
