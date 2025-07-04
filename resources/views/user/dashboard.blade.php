<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Surat Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap');

        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bg-white">
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 flex flex-col">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <p>
            <p>{{ Auth::user()->name }}</p>
            </p>
            <button id="closeSidebar" aria-label="Close sidebar"
                class="text-2xl text-gray-900 hover:text-gray-700 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav class="flex flex-col mt-6 space-y-4 px-6 text-center">
            {{-- <a href="{{ route('user.profile') }}"
                class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                Profile
            </a> --}}
            <a href="{{ route('profile.edit') }}"
                class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                Profile
            </a>
            <a href="{{ route('user.dashboard') }}"
                class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition-colors duration-300">
                Beranda
            </a>
            <a href="{{ route('pengajuan.riwayat') }}"
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

    <main
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Beasiswa -->
        <section class="bg-[#f7f7f7] rounded-3xl shadow p-8 flex flex-col items-center text-center justify-center">
            <h2 class="text-[#6f8a74] font-extrabold text-xl mb-6">Surat Izin Pengajuan Beasiswa</h2>
            <a href="{{ route('pengajuan.beasiswa.form') }}"
                class="bg-[#6f8a74] text-white text-xs rounded-full px-6 py-2 hover:bg-[#5a715d] transition">
                Ajukan Surat
            </a>
        </section>

        <!-- Kerja Praktek -->
        <section class="bg-[#f7f7f7] rounded-3xl shadow p-8 flex flex-col items-center text-center justify-center">
            <h2 class="text-[#6f8a74] font-extrabold text-xl mb-6">Surat Permohonan Kerja Praktek</h2>
            <a href="{{ route('permohonan.form') }}"
                class="bg-[#6f8a74] text-white text-xs rounded-full px-6 py-2 hover:bg-[#5a715d] transition">
                Ajukan Surat
            </a>
        </section>

        <!-- Penelitian -->
        <section class="bg-[#f7f7f7] rounded-3xl shadow p-8 flex flex-col items-center text-center justify-center">
            <h2 class="text-[#6f8a74] font-extrabold text-xl mb-6">Surat Izin Penelitian</h2>
            <a href="{{ route('penelitian.form') }}"
                class="bg-[#6f8a74] text-white text-xs rounded-full px-6 py-2 hover:bg-[#5a715d] transition">
                Ajukan Surat
            </a>
        </section>

        <!-- Seminar KP -->
        <section class="bg-[#f7f7f7] rounded-3xl shadow p-8 flex flex-col items-center text-center justify-center">
            <h2 class="text-[#6f8a74] font-extrabold text-xl mb-6">Surat Izin Seminar Kerja Praktek</h2>
            <a href="{{ route('izinkerjapraktek.form') }}"
                class="bg-[#6f8a74] text-white text-xs rounded-full px-6 py-2 hover:bg-[#5a715d] transition">
                Ajukan Surat
            </a>
        </section>

        <!-- Pindah Prodi -->
        <section class="bg-[#f7f7f7] rounded-3xl shadow p-8 flex flex-col items-center text-center justify-center">
            <h2 class="text-[#6f8a74] font-extrabold text-xl mb-6">Surat Izin Pindah Prodi</h2>
            <a href="{{ route('pindahprodi.form') }}"
                class="bg-[#6f8a74] text-white text-xs rounded-full px-6 py-2 hover:bg-[#5a715d] transition">
                Ajukan Surat
            </a>
        </section>
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
