<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulir Pengajuan Surat Kerja Praktek</title>
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

    <form action="{{ route('store.permohonan_kerja_praktek') }}" method="POST" enctype="multipart/form-data"
        class="bg-white rounded-xl max-w-4xl w-full p-10 mt-16 shadow-md">
        @csrf
        <h1 class="text-center font-extrabold text-lg leading-tight mb-8">
            Formulir Pengajuan<br />Surat Permohonan Kerja Praktek
        </h1>

        {{-- Isian Otomatis dari Auth User --}}
        <label class="block mb-1 text-sm font-normal text-black">Nama Mahasiswa</label>
        <input type="text" value="{{ auth()->user()->name }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Nomor Mahasiswa</label>
        <input type="text" value="{{ auth()->user()->nim }}" readonly
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm">IPK dan Jumlah SKS</label>
        <div class="flex space-x-2 mb-6">
            <input type="text" value="{{ auth()->user()->ipk }}" readonly
                class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />
            <input type="text" value="{{ auth()->user()->sks }}" readonly
                class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />
        </div>

        {{-- Isian Manual --}}
        <label class="block mb-1 text-sm font-normal text-black">Alamat Asal</label>
        <input type="text" name="alamat" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Nomor Telepon</label>
        <input type="text" name="telepon" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Tempat/Tanggal Lahir</label>
        <input type="text" name="ttl" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />



        <label class="block mb-1 text-sm font-normal text-black">Bukti Nilai Lulus</label>
        <input type="file" name="nilai_lulus"
            class="w-full border mb-4 px-3 py-1.5 text-sm text-green-700 cursor-pointer" required>

        <label class="block mb-1 text-sm font-normal text-black">Foto KTM</label>
        <input type="file" name="ktm"
            class="w-full border mb-10 px-3 py-1.5 text-sm text-green-700 cursor-pointer" required>

        <div class="text-center">
            <button type="submit" class="px-6 py-2 border border-green-700 text-green-700 rounded hover:bg-green-50">
                Upload
            </button>
        </div>
    </form>
</body>

</html>
