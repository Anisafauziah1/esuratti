<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin - E-Surat Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bg-white relative overflow-x-hidden">
    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 flex flex-col">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            {{-- <p class="text-lg font-bold">Admin</p> --}}
            <button id="closeSidebar" aria-label="Close sidebar"
                class="text-2xl text-gray-900 hover:text-gray-700 focus:outline-none mr-4">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav class="flex flex-col mt-6 space-y-4 px-6 text-center">
            <a href="#"
                class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                Beranda
            </a>
            <a href="{{ route('admin.pengajuan.index') }}"
                class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                Permintaan Surat
            </a>
            <a href="{{ route('historyadmin') }}"
                class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                Riwayat
            </a>
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin keluar?');"
                class="w-full">
                @csrf
                <button type="submit"
                    class="w-full text-center text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                    Keluar
                </button>
            </form>

        </nav>
    </aside>

    <header
        class="relative bg-gradient-to-br from-[#e2f7dd] via-[#f0f5f9] to-[#dfe3eb] rounded-b-[150px] sm:rounded-b-[200px] pt-8 sm:pt-14">
        <nav class="p-6 flex justify-start">
            <button id="openSidebar" aria-label="Open menu" class="text-black text-3xl">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
        <div class="max-w-4xl mx-auto px-6 pt-10 sm:pt-16 pb-24 sm:pb-32">
            <h1
                class="text-center text-[28px] sm:text-[36px] md:text-[40px] font-extrabold text-[#7a9987] leading-tight">
                Selamat Datang di E-Surat Mahasiswa<br />Prodi Teknologi Informasi
            </h1>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-6 pt-20 pb-24 sm:pt-28 sm:pb-32 grid grid-cols-1 sm:grid-cols-3 gap-6">
    <a href="{{ route('admin.pengajuan.index') }}"
        class="bg-[#f5f5f5] rounded-3xl p-6 flex items-center justify-between hover:shadow-md transition-shadow duration-300">
        <div>
            <h2 class="text-lg font-semibold leading-snug text-black">Permintaan Menunggu</h2>
            <p class="mt-2 text-base leading-relaxed text-black">{{ $jumlahPending }} permintaan perlu diproses</p>
        </div>
        <div class="text-5xl text-black">
            <i class="far fa-clock"></i>
        </div>
    </a>

    <a href="{{ route('historyadmin') }}"
        class="bg-[#f5f5f5] rounded-3xl p-6 flex items-center justify-between hover:shadow-md transition-shadow duration-300">
        <div>
            <h2 class="text-lg font-semibold leading-snug text-black">Surat Disetujui</h2>
            <p class="mt-2 text-base leading-relaxed text-black">{{ $jumlahAccepted }} surat telah disetujui</p>
        </div>
        <div class="text-5xl text-black">
            <i class="fas fa-check-circle"></i>
        </div>
    </a>

    <a href="#"
        class="bg-[#f5f5f5] rounded-3xl p-6 flex items-center justify-between hover:shadow-md transition-shadow duration-300">
        <div>
            <h2 class="text-lg font-semibold leading-snug text-black">Surat Revisi</h2>
            <p class="mt-2 text-base leading-relaxed text-black">{{ $jumlahRejected }} surat ditolak/revisi</p>
        </div>
        <div class="text-5xl text-black">
            <i class="fas fa-times-circle"></i>
        </div>
    </a>
</main>


    <script>
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        openBtn.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);
    </script>
</body>

</html>
