<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulir Pengajuan Surat Permohonan Beasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-[#d9e6de] to-[#e6e2ec] flex items-start justify-center p-6">

    <div class="absolute top-6 left-6">
        <a href="{{ route('user.dashboard') }}" aria-label="Back to dashboard"
            class="text-black text-xl border border-black rounded-full w-10 h-10 flex items-center justify-center">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <form action="{{ route('pengajuan.beasiswa.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white rounded-xl max-w-4xl w-full p-10 mt-16"
        aria-label="Formulir Pengajuan Surat Permohonan Beasiswa">

        @csrf

        <h1 class="text-center font-extrabold text-lg leading-tight mb-8">
            Formulir Pengajuan<br />
            Surat Permohonan Beasiswa
        </h1>

        {{-- Informasi Otomatis dari User --}}
        <label class="block mb-1 text-sm font-normal text-black">Nama Mahasiswa</label>
        <input type="text" value="{{ auth()->user()->name }}" readonly
            class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Nomor Mahasiswa (NIM)</label>
        <input type="text" value="{{ auth()->user()->nim }}" readonly
            class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Program Studi</label>
        <input type="text" value="{{ auth()->user()->prodi }}" readonly
            class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Fakultas</label>
        <input type="text" value="{{ auth()->user()->fakultas }}" readonly
            class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-1.5 mb-6" />

        <h2 class="font-extrabold text-center text-base mb-3">Upload Persyaratan</h2>

        <label class="block mb-1 text-sm font-normal text-black">Foto Kartu Tanda Mahasiswa</label>
        <input type="file" name="ktm" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-sm" />

        <label class="block mb-1 text-sm font-normal text-black">KHS atau Transkrip Nilai Terbaru</label>
        <input type="file" name="khs" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-sm" />

        <label class="block mb-1 text-sm font-normal text-black">Bukti Aktivitas Kemahasiswaan</label>
        <input type="file" name="aktivitas" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-sm" />

        <label class="block mb-1 text-sm font-normal text-black">Bukti Prestasi non-Akademik (Opsional)</label>
        <input type="file" name="prestasi"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-sm" />

        <label class="block mb-1 text-sm font-normal text-black">Bukti Informasi Keluarga (Opsional)</label>
        <input type="file" name="keluarga"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-10 text-sm" />

        <div class="flex justify-center">
            <button type="submit"
                class="border border-green-700 text-green-700 text-sm rounded px-10 py-2 hover:bg-green-50 transition">
                Ajukan Surat
            </button>
        </div>
    </form>

</body>

</html>
