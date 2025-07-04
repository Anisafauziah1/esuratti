<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Pengajuan Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#e8f2f5] to-[#f4f0f7] min-h-screen p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold mb-6">Detail Pengajuan Surat</h1>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div><strong>Nama Mahasiswa:</strong> {{ $pengajuan->user->name }}</div>
            <div><strong>NIM:</strong> {{ $pengajuan->user->nim }}</div>
            <div><strong>Program Studi:</strong> {{ $pengajuan->user->prodi }}</div>
            <div><strong>Fakultas:</strong> {{ $pengajuan->user->fakultas }}</div>
            <div><strong>Jenis Surat:</strong> {{ $pengajuan->suratType->nama }}</div>
            <div><strong>Tanggal Pengajuan:</strong> {{ $pengajuan->created_at->format('d M Y') }}</div>
            <div><strong>Status:</strong>
                <span
                    class="{{ $pengajuan->status === 'accepted' ? 'text-green-600' : ($pengajuan->status === 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">
                    {{ ucfirst($pengajuan->status) }}
                </span>
            </div>
        </div>

        @if ($pengajuan->persyaratans && $pengajuan->persyaratans->count())
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Persyaratan</h2>
                <ul class="space-y-2">
                    @foreach ($pengajuan->persyaratans as $syarat)
                        <li class="flex flex-col md:flex-row md:items-center justify-between border px-4 py-2 rounded">
                            <div class="font-medium">{{ $syarat->nama_syarat }}</div>
                            @if ($syarat->type === 'text')
                                <div class="text-sm text-gray-700 mt-1 md:mt-0">
                                    {{ $syarat->isian }}
                                </div>
                            @elseif ($syarat->type === 'file' && $syarat->file_path)
                                <a href="{{ asset('storage/' . $syarat->file_path) }}" target="_blank"
                                    class="text-blue-600 hover:underline text-sm mt-1 md:mt-0">
                                    Lihat
                                </a>
                            @else
                                <div class="text-sm text-gray-500 mt-1 md:mt-0 italic">Tidak tersedia</div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if ($pengajuan->status === 'pending')
            <div class="flex gap-4 mt-6">
                <form method="POST" action="{{ route('admin.pengajuan.setujui', $pengajuan) }}">
                    @csrf
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Setujui
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.pengajuan.tolak', $pengajuan) }}">
                    @csrf
                    <input type="hidden" name="keterangan" value="Tidak memenuhi syarat">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Tolak
                    </button>
                </form>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('admin.pengajuan.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali ke
                Daftar Pengajuan</a>
        </div>
    </div>
</body>

</html>
