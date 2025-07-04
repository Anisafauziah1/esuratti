<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pengajuan;
use App\Models\SuratType;
use Illuminate\Http\Request;
use App\Models\PengajuanPersyaratan;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function storeBeasiswa(Request $request)
    {
        $request->validate([
            'ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'khs' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'aktivitas' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'prestasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = auth()->user();
        $suratType = SuratType::where('nama', 'like', '%beasiswa%')->firstOrFail();

        // Simpan pengajuan
        $pengajuan = Pengajuan::create([
            'user_id' => $user->id,
            'surat_type_id' => $suratType->id,
            'status' => 'pending',
            'keterangan' => null,
        ]);

        // Persyaratan teks (dari user)
        $dataTeks = [
            'Nama Mahasiswa' => $user->name,
            'Nomor Mahasiswa' => $user->nim,
            'Program Studi' => $user->prodi,
            'Fakultas' => $user->fakultas,
        ];

        foreach ($dataTeks as $label => $isian) {
            PengajuanPersyaratan::create([
                'pengajuan_id' => $pengajuan->id,
                'nama_syarat' => $label,
                'type' => 'text',
                'isian' => $isian,
                'file_path' => null,
            ]);
        }

        // Persyaratan file
        $fileInputs = [
            'ktm' => 'Foto Kartu Tanda Mahasiswa',
            'khs' => 'KHS atau Transkrip Nilai Terbaru',
            'aktivitas' => 'Bukti Aktivitas Kemahasiswaan',
            'prestasi' => 'Bukti Prestasi non-Akademik (Opsional)',
            'keluarga' => 'Bukti Informasi Keluarga (Opsional)',
        ];

        foreach ($fileInputs as $field => $label) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('pengajuan/beasiswa', 'public');

                PengajuanPersyaratan::create([
                    'pengajuan_id' => $pengajuan->id,
                    'nama_syarat' => $label,
                    'type' => 'file',
                    'isian' => null,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('user.dashboard')->with('success', 'Pengajuan surat beasiswa berhasil diajukan.');
    }

    public function riwayat()
    {
        $pengajuans = \App\Models\Pengajuan::with('suratType')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.history', compact('pengajuans'));
    }

    public function indexAdmin()
    {
        $pengajuans = Pengajuan::with(['user', 'suratType'])->latest()->get();
        return view('admin.pengajuan', compact('pengajuans'));
    }

    public function setujui(Pengajuan $pengajuan)
    {
        $templateView = $pengajuan->suratType->template_view;

        if (!view()->exists($templateView)) {
            return back()->with('error', 'Template surat tidak ditemukan.');
        }

        $pdf = Pdf::loadView($templateView, compact('pengajuan'));

        $namaFile = 'pengantar/' . $pengajuan->suratType->nama . '/surat_pengantar_' . $pengajuan->id . '.pdf';

        Storage::disk('public')->put($namaFile, $pdf->output());

        $pengajuan->update([
            'status' => 'accepted',
            'file_surat_pengantar' => $namaFile,
        ]);

        return back()->with('success', 'Surat berhasil disetujui dan dibuat.');
    }

    public function tolak(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'keterangan' => 'nullable|string',
        ]);

        $pengajuan->update([
            'status' => 'rejected',
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Pengajuan ditolak.');
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('admin.persyaratan', compact('pengajuan'));
    }

    public function storePermohonanKerjaPraktek(Request $request)
    {
        $request->validate([
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:50',
        'ttl' => 'required|string|max:100',
        'nilai_lulus' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $user = auth()->user();
    $suratType = SuratType::where('nama', 'like', '%kerja praktek%')->firstOrFail();

    // Simpan pengajuan
    $pengajuan = Pengajuan::create([
        'user_id' => $user->id,
        'surat_type_id' => $suratType->id,
        'status' => 'pending',
        'keterangan' => null,
    ]);

    // Simpan isian teks
    $dataTeks = [
        'Nama Mahasiswa' => $user->name,
        'Nomor Mahasiswa' => $user->nim,
        'Program Studi' => $user->prodi,
        'Fakultas' => $user->fakultas,
        'Alamat Asal' => $request->alamat,
        'Nomor Telepon' => $request->telepon,
        'Tempat/Tanggal Lahir' => $request->ttl,
        'IPK' => $user->ipk,
        'Jumlah SKS' => $user->sks,
    ];

    foreach ($dataTeks as $label => $isian) {
        PengajuanPersyaratan::create([
            'pengajuan_id' => $pengajuan->id,
            'nama_syarat' => $label,
            'type' => 'text',
            'isian' => $isian,
            'file_path' => null,
        ]);
    }

    // Simpan file
    $fileInputs = [
        'nilai_lulus' => 'Bukti Nilai Lulus',
        'ktm' => 'KTM',
    ];

    foreach ($fileInputs as $field => $label) {
        if ($request->hasFile($field)) {
            $path = $request->file($field)->store('pengajuan/kerja_praktek', 'public');

            PengajuanPersyaratan::create([
                'pengajuan_id' => $pengajuan->id,
                'nama_syarat' => $label,
                'type' => 'file',
                'isian' => null,
                'file_path' => $path,
            ]);
        }
    }

    return redirect()->route('user.dashboard')->with('success', 'Pengajuan surat kerja praktek berhasil diajukan.');
    }

    public function storePenelitian(Request $request)
    {
        $request->validate([
            'judul_ta' => 'required|string|max:255',
            'dosen1' => 'required|string|max:255',
            'dosen2' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $suratType = SuratType::where('nama', 'like', '%penelitian%')->firstOrFail();

        $pengajuan = Pengajuan::create([
            'user_id' => $user->id,
            'surat_type_id' => $suratType->id,
            'status' => 'pending',
        ]);

        $dataTeks = [
            'Nama Mahasiswa' => $user->name,
            'Nomor Mahasiswa' => $user->nim,
            'Program Studi' => $user->prodi,
            'Fakultas' => $user->fakultas,
            'Judul TA/Skripsi' => $request->judul_ta,
            'Dosen Pembimbing 1' => $request->dosen1,
            'Dosen Pembimbing 2' => $request->dosen2,
        ];

        foreach ($dataTeks as $label => $isian) {
            PengajuanPersyaratan::create([
                'pengajuan_id' => $pengajuan->id,
                'nama_syarat' => $label,
                'type' => 'text',
                'isian' => $isian,
            ]);
        }

        return redirect()->route('user.dashboard')->with('success', 'Pengajuan surat penelitian berhasil diajukan.');
    }


    public function storeSKP(Request $request)
    {
        $request->validate([
        'lokasi' => 'required|string|max:255',
        'judulskp' => 'required|string|max:255',
        'hari' => 'required|string|max:50',
        'tanggal' => 'required|string|max:50',
        'jam' => 'required|string|max:50',
        'buktiselesai' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $user = auth()->user();

    // Ambil jenis surat
    $suratType = \App\Models\SuratType::where('nama', 'Surat Izin Seminar Kerja Praktek')->firstOrFail();

    // Simpan data pengajuan utama
    $pengajuan = \App\Models\Pengajuan::create([
        'user_id' => $user->id,
        'surat_type_id' => $suratType->id,
        'status' => 'pending',
        'keterangan' => null,
    ]);

    // Simpan data persyaratan teks
    $dataTeks = [
        'Nama Mahasiswa' => $user->name,
        'Nomor Mahasiswa' => $user->nim,
        'Lokasi' => $request->lokasi,
        'Judul SKP' => $request->judulskp,
        'Hari' => $request->hari,
        'Tanggal' => $request->tanggal,
        'Jam' => $request->jam,
    ];

    foreach ($dataTeks as $label => $value) {
        \App\Models\PengajuanPersyaratan::create([
            'pengajuan_id' => $pengajuan->id,
            'nama_syarat' => $label,
            'type' => 'text',
            'isian' => $value,
            'file_path' => null,
        ]);
    }

    // Simpan data persyaratan file
    $fileInputs = [
        'buktiselesai' => 'Bukti Surat Selesai KP',
        'ktm' => 'KTM',
    ];

    foreach ($fileInputs as $field => $label) {
        if ($request->hasFile($field)) {
            $path = $request->file($field)->store('pengajuan/izin-seminar-kp', 'public');

            \App\Models\PengajuanPersyaratan::create([
                'pengajuan_id' => $pengajuan->id,
                'nama_syarat' => $label,
                'type' => 'file',
                'isian' => null,
                'file_path' => $path,
            ]);
        }
    }

    return redirect()->route('user.dashboard')->with('success', 'Pengajuan Surat Izin Seminar KP berhasil diajukan.');
}

    public function storePindahProdi(Request $request)
    {
        $request->validate([
            'bebas_perpus_umy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bebas_perpus_daerah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bebas_spp_dpp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = auth()->user();
        $suratType = SuratType::where('nama', 'like', '%Pindah Prodi%')->firstOrFail();

        $pengajuan = Pengajuan::create([
            'user_id' => $user->id,
            'surat_type_id' => $suratType->id,
            'status' => 'pending',
            'keterangan' => null,
        ]);

        // Data teks yang ingin disimpan
        $dataTeks = [
            'Nama Mahasiswa' => $user->name,
            'Nomor Mahasiswa' => $user->nim,
            'Fakultas' => $request->input('fakultas', $user->fakultas ?? '-'),
            'Program Studi' => $request->input('prodi', $user->prodi ?? '-'),
            'Semester' => $request->input('semester', $user->semester ?? '-'),
            'Tahun Akademik' => $request->input('tahun_akademik'),
        ];

        foreach ($dataTeks as $label => $value) {
            PengajuanPersyaratan::create([
                'pengajuan_id' => $pengajuan->id,
                'nama_syarat' => $label,
                'type' => 'text',
                'isian' => $value,
                'file_path' => null,
            ]);
        }

        // Simpan file persyaratan
        $fileInputs = [
            'bebas_perpus_umy' => 'Surat Keterangan bebas Perpustakaan UMY',
            'bebas_perpus_daerah' => 'Surat Keterangan bebas Perpustakaan Daerah',
            'bebas_spp_dpp' => 'Surat Keterangan bebas pembayaran biaya SPP dan DPP',
            'ktm' => 'KTM',
        ];

        foreach ($fileInputs as $field => $label) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('pengajuan/pindah-prodi', 'public');

                PengajuanPersyaratan::create([
                    'pengajuan_id' => $pengajuan->id,
                    'nama_syarat' => $label,
                    'type' => 'file',
                    'isian' => null,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('user.dashboard')->with('success', 'Pengajuan Surat Izin Pindah Prodi berhasil diajukan.');
    }

    public function riwayatAdmin(Request $request)
{
    $query = $request->input('search');

    $pengajuans = Pengajuan::with(['user', 'suratType'])
        ->where('status', 'accepted')
        ->when($query, function ($q) use ($query) {
            $q->whereHas('user', function ($uq) use ($query) {
                $uq->where('name', 'like', "%$query%")
                   ->orWhere('nim', 'like', "%$query%");
            })->orWhereHas('suratType', function ($sq) use ($query) {
                $sq->where('nama', 'like', "%$query%");
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    // Format label untuk blade
    $paginated = $pengajuans->map(function ($item) {
        return [
            'item' => $item,
            'label' => $item->suratType->nama ?? '-',
        ];
    });

    return view('admin.historyadmin', compact('paginated', 'pengajuans', 'query'));

}


}
