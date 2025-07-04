<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Profil</title>
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
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4 max-w-4xl w-full">
            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit Profil -->
    <form method="POST" action="/profile/update"
        class="bg-white rounded-xl max-w-4xl w-full p-10 mt-16"
        aria-label="Form Edit Profil">
        @csrf
        @method('PUT')

        <h1 class="text-center font-extrabold text-lg leading-tight mb-8">
            Formulir Edit Profil Mahasiswa
        </h1>

        <label class="block mb-1 text-sm font-normal text-black">Nama</label>
        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Email</label>
        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">NIM</label>
        <input type="text" name="nim" value="{{ old('nim', auth()->user()->nim) }}"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">IPK</label>
        <input type="text" name="ipk" value="{{ old('ipk', auth()->user()->ipk) }}"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">SKS</label>
        <input type="number" name="sks" value="{{ old('sks', auth()->user()->sks) }}"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Program Studi</label>
        <input type="text" name="prodi" value="{{ old('prodi', auth()->user()->prodi) }}"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Fakultas</label>
        <input type="text" name="fakultas" value="{{ old('fakultas', auth()->user()->fakultas) }}"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

        <label class="block mb-1 text-sm font-normal text-black">Semester</label>
        <input type="number" name="semester" value="{{ old('semester', auth()->user()->semester) }}"
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-10" />

        <div class="flex justify-center">
            <button type="submit"
                class="border border-green-700 text-green-700 text-xs rounded px-10 py-1.5 hover:bg-green-50 transition">
                Simpan
            </button>
        </div>
    </form>

</body>

</html>
