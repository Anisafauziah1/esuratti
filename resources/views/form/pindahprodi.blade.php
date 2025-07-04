<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulir Pengajuan</title>
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
        <a href="#" aria-label="Back to dashboard"
            class="text-black text-xl border border-black rounded-full w-10 h-10 flex items-center justify-center">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <form action="{{ route('store.pindahprodi') }}" method="POST" enctype="multipart/form-data"
        class="bg-white rounded-xl max-w-4xl w-full p-10 mt-16" aria-label="Formulir Pengajuan Surat Izin Pindah Prodi">
        @csrf

        <h1 class="text-center font-extrabold text-lg leading-tight mb-8">
            Formulir Pengajuan<br />
            Surat Izin Pindah Prodi
        </h1>

        <label class="block mb-1 text-sm font-normal text-black">Nama Mahasiswa</label>
        <input type="text" name="nama" value="{{ auth()->user()->name }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Nomor Mahasiswa</label>
        <input type="text" name="nim" value="{{ auth()->user()->nim }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Fakultas</label>
        <input type="text" name="fakultas" value="{{ auth()->user()->fakultas ?? '' }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Program Studi</label>
        <input type="text" name="prodi" value="{{ auth()->user()->prodi ?? '' }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Semester</label>
        <input type="text" name="semester" value="{{ auth()->user()->semester ?? '' }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Tahun Akademik</label>
        <input type="text" name="tahun_akademik" placeholder="Contoh: 2024/2025" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <h2 class="font-extrabold text-center text-base mb-3 mt-8">Upload Persyaratan</h2>

        <label class="block mb-1 text-sm font-normal text-black">Surat Keterangan bebas Perpustakaan UMY</label>
        <input type="file" name="bebas_perpus_umy" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-xs text-green-700 cursor-pointer" />

        <label class="block mb-1 text-sm font-normal text-black">Surat Keterangan bebas Perpustakaan Daerah</label>
        <input type="file" name="bebas_perpus_daerah" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-xs text-green-700 cursor-pointer" />

        <label class="block mb-1 text-sm font-normal text-black">Surat Keterangan bebas pembayaran biaya SPP dan
            DPP</label>
        <input type="file" name="bebas_spp_dpp" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-xs text-green-700 cursor-pointer" />

        <label class="block mb-1 text-sm font-normal text-black">Foto Kartu Tanda Mahasiswa</label>
        <input type="file" name="ktm" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-8 text-xs text-green-700 cursor-pointer" />

        <div class="flex justify-center">
            <button type="submit"
                class="border border-green-700 text-green-700 text-xs rounded px-10 py-1.5 hover:bg-green-50 transition">
                Upload
            </button>
        </div>
    </form>

</body>

</html>
