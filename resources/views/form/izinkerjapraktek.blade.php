<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulir Pengajuan Surat Permohonan Seminar KP</title>
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
    <!-- Tombol kembali -->
    <div class="absolute top-6 left-6">
        <a href="{{ route('user.dashboard') }}" aria-label="Back to dashboard"
            class="text-black text-xl border border-black rounded-full w-10 h-10 flex items-center justify-center">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulir -->
    {{-- @dd(route('store.skp')) --}}
    <form action="http://127.0.0.1:8000/pengajuan/seminar-kp" method="POST" enctype="multipart/form-data"
        class="bg-white rounded-xl max-w-4xl w-full p-10 mt-16"
        aria-label="Formulir Pengajuan Surat Permohonan Seminar KP">
        @csrf
        @method('POST')
        <h1 class="text-center font-extrabold text-lg leading-tight mb-8">
            Formulir Pengajuan<br />
            Surat Permohonan Seminar KP
        </h1>

        <label class="block mb-1 text-sm font-normal text-black">Nama Mahasiswa</label>
        <input type="text" value="{{ auth()->user()->name }}" readonly required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Nomor Mahasiswa</label>
        <input type="text" value="{{ auth()->user()->nim }}" readonly required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Lokasi KP</label>
        <input type="text" name="lokasi" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Judul SKP</label>
        <input type="text" name="judulskp" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Hari</label>
        <input type="text" name="hari" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Tanggal</label>
        <input type="date" name="tanggal" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Jam</label>
        <input type="time" name="jam" required class="w-full border border-gray-300 rounded px-3 py-1.5 mb-6" />
        

        <h2 class="font-extrabold text-center text-base mb-3">Upload Persyaratan</h2>

        <label class="block mb-1 text-sm font-normal text-black">Bukti Surat Selesai KP</label>
        <span class="block mb-1 text-xs text-red-600">*dari Lokasi KP/Instansi</span>
        <input type="file" name="buktiselesai" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4 text-xs text-green-700 cursor-pointer" />

        <label class="block mb-1 text-sm font-normal text-black">Foto Kartu Tanda Mahasiswa</label>
        <input type="file" name="ktm" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-10 text-xs text-green-700 cursor-pointer" />

        <div class="flex justify-center">
            <button type="submit"
                class="border border-green-700 text-green-700 text-xs rounded px-10 py-1.5 hover:bg-green-50 transition">
                Upload
            </button>
        </div>
    </form>

</body>

</html>