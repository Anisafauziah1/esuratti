<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat Pengajuan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    body {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex">
  <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 flex flex-col">
    <div class="flex items-center justify-between p-6 border-b border-gray-200">
      <p class="font-semibold">Admin</p>
      <button id="closeSidebar" class="text-2xl text-gray-900 hover:text-gray-700 focus:outline-none">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <nav class="flex flex-col mt-6 space-y-4 px-6 text-center">
      <a href="{{ route('admin.homeadmin') }}" class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition">
        Beranda
      </a>
      <a href="{{ route('admin.pengajuan.index') }}" class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition">
        Permintaan Surat
      </a>
      <a href="{{ route('historyadmin') }}" class="text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition">
        Riwayat
      </a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full text-center text-[#78977F] font-semibold text-base py-2 rounded hover:bg-[#78977F] hover:text-white transition">
          Keluar
        </button>
      </form>
    </nav>
  </aside>

  <div class="flex-1 bg-gradient-to-r from-[#E7E0EC] to-[#E9FFEE] p-6">
    <div class="w-full rounded-3xl p-6 md:p-10 flex flex-col">
      <header class="flex items-center gap-6 mb-6">
        <nav class="p-6 flex justify-start">
          <button id="openSidebar" class="text-black text-3xl">
            <i class="fas fa-bars"></i>
          </button>
        </nav>
        <form method="GET" action="{{ route('historyadmin') }}" class="relative flex-1">
          <input
            type="search"
            name="search"
            placeholder="Search"
            value="{{ $query ?? '' }}"
            class="w-full rounded-full py-2 px-4 text-sm md:text-base shadow focus:outline-none"
          />
          <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
            <i class="fas fa-search"></i>
          </div>
        </form>
      </header>

      <!-- Table -->
      <section class="bg-white rounded-2xl shadow overflow-hidden px-6 pb-6">
        <table class="w-full border-collapse">
          <thead>
            <tr class="text-black text-sm font-normal border-b border-gray-200">
              <th class="py-3 px-6 text-left">Mahasiswa</th>
              <th class="py-3 px-6 text-left">NIM</th>
              <th class="py-3 px-6 text-left">Jenis Surat</th>
              <th class="py-3 px-6 text-left">Tanggal Pengajuan</th>
              <th class="py-3 px-6 text-left">Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($paginated as $data)
              @php
                $item = $data['item'];
                $label = $data['label'];
              @endphp
              <tr class="border-b border-gray-200 text-sm text-black">
                <td class="py-4 px-6">{{ $item->user->name ?? '-' }}</td>
                <td class="py-4 px-6">{{ $item->user->nim ?? '-' }}</td>
                <td class="py-4 px-6">{{ $label }}</td>
                <td class="py-4 px-6">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                <td class="py-4 px-6 text-green-700 capitalize">{{ $item->status }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada data pengajuan disetujui.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6">
          {{ $pengajuans->links() }}
        </div>
      </section>
    </div>
  </div>

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
