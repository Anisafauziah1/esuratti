<!DOCTYPE html>
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
            <button id="closeSidebar" aria-label="Close sidebar"
                class="text-2xl text-gray-900 hover:text-gray-700 focus:outline-none mr-4">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav class="flex flex-col mt-6 space-y-4 px-6 text-center">
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

    <header>
        <nav class="p-6 flex justify-start">
            <button id="openSidebar" aria-label="Open menu" class="text-black text-3xl">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <main class="bg-white rounded-2xl shadow-[0_4px_10px_rgba(0,0,0,0.05)] overflow-hidden px-6 pb-6"
        style="backdrop-filter: blur(10px);">
        <table class="w-full border-collapse">
            <thead>
                <tr class="text-center py-3 px-4 bg-gradient-to-r from-[#e6f9ec] to-[#f0eff6] text-sm font-normal">
                    <th class="py-2">No.</th>
                    <th class="py-2">Jenis Surat</th>
                    <th class="py-2">Tanggal Pengajuan</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuans as $index => $pengajuan)
                    <tr class="text-center border-b border-gray-200">
                        <td class="py-8 text-left pl-6">{{ $index + 1 }}.</td>
                        <td class="py-8 text-center">{{ $pengajuan->suratType->nama }}</td>
                        <td class="py-8">{{ $pengajuan->created_at->format('d M Y') }}</td>
                        <td
                            class="py-8 font-medium
                @if ($pengajuan->status === 'accepted') text-green-700
                @elseif($pengajuan->status === 'rejected') text-red-700
                @else text-yellow-600 @endif">
                            {{ ucfirst($pengajuan->status) }}
                        </td>
                        <td class="py-8">
                            @if ($pengajuan->status === 'accepted' && $pengajuan->file_surat_pengantar)
                                <a href="{{ asset('storage/' . $pengajuan->file_surat_pengantar) }}" target="_blank"
                                    class="border border-[#4a7a4a] text-[#4a7a4a] text-xs px-4 py-1 rounded-md hover:bg-[#e5f0e5]">
                                    Lihat
                                </a>
                            @else
                                <span
                                    class="border border-gray-300 text-gray-400 text-xs px-4 py-1 rounded-md cursor-not-allowed">
                                    Lihat
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="text-center text-gray-500">
                        <td colspan="5" class="py-8">Belum ada pengajuan.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
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
