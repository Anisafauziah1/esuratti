<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\SuratType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

User::updateOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin Satu',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]
);


        User::updateOrCreate(
    ['email' => 'user@example.com'],
    [
        'name' => 'User Mahasiswa',
        'password' => Hash::make('password'),
        'role' => 'user',
        'nim' => '123456789',
        'ipk' => 3.75,
        'sks' => 110,
        'prodi' => 'Teknologi Informasi',
        'fakultas' => 'FTI',
        'semester' => 6,
    ]
);


        SuratType::create([
            'nama' => 'Surat Izin Pengajuan Beasiswa',
            'template_view' => 'surat_templates.beasiswa',
            'persyaratan' => json_encode([
                ['label' => 'KTM', 'type' => 'file'],
                ['label' => 'KHS', 'type' => 'file'],
                ['label' => 'Bukti Aktivitas Kemahasiswaan', 'type' => 'file'],
                ['label' => 'Bukti Prestasi non-Akademik (Opsional)', 'type' => 'file'],
                ['label' => 'Bukti Informasi Keluarga (Opsional)', 'type' => 'file'],
            ]),
        ]);

        SuratType::create([
            'nama' => 'Surat Permohonan Kerja Praktek',
            'template_view' => 'surat_templates.permohonankerjapraktek',
            'persyaratan' => json_encode([
                ['label' => 'KTM', 'type' => 'file'],
                ['label' => 'Bukti Nilai Lulus', 'type' => 'file'],
            ]),
        ]);

        SuratType::create([
            'nama' => 'Surat Izin Penelitian',
            'template_view' => 'surat_templates.penelitian',
            'persyaratan' => json_encode([
                ['label' => 'Judul TA/Skripsi', 'type' => 'text'],
                ['label' => 'Dosen Pembimbing 1', 'type' => 'text'],
                ['label' => 'Dosen Pembimbing 2', 'type' => 'text'],
            ]),
        ]);

        SuratType::create([
            'nama' => 'Surat Izin Seminar Kerja Praktek',
            'template_view' => 'surat_templates.izinkerjapraktek',
            'persyaratan' => json_encode([
                ['label' => 'Lokasi', 'type' => 'text'],
                ['label' => 'Judul SKP', 'type' => 'text'],
                ['label' => 'Hari', 'type' => 'text'],
                ['label' => 'Tanggal', 'type' => 'text'],
                ['label' => 'Jam', 'type' => 'text'],
                ['label' => 'Bukti Surat Selesai KP', 'type' => 'file'],
                ['label' => 'KTM', 'type' => 'file'],
            ]),
        ]);

        SuratType::create([
            'nama' => 'Surat Izin Pindah Prodi',
            'template_view' => 'surat_templates.pindahprodi',
            'persyaratan' => json_encode([
                ['label' => 'Surat Keterangan bebas Perpustakaan UMY', 'type' => 'file'],
                ['label' => 'Surat Keterangan bebas Perpustakaan Daerah', 'type' => 'file'],
                ['label' => 'Surat Keterangan bebas pembayaran biaya SPP dan DPP', 'type' => 'file'],
                ['label' => 'KTM', 'type' => 'file'],
            ]),
        ]);
    }
}