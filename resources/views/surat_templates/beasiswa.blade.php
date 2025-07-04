<style>
    .form-header {
        text-align: right;
        font-weight: bold;
        border: 1px solid black;
        display: inline-block;
        padding: 5px 10px;
        margin-bottom: 20px;
    }
    .indent {
        text-indent: 40px;
    }
</style>

<!-- <div class="form-header">Form 1: BU</div>

<p><strong>Hal:</strong> Pengajuan Beasiswa Umum (BU) UMY</p> -->

<p>Kepada<br>
Yth. Rektor Universitas Muhammadiyah Yogyakarta<br>
Di<br>
Tempat</p>

<p>Assalamu’alaikum Wr. Wb.</p>

<p>Bersama ini saya:</p>

<table style="margin-left: 30px;">
    <tr>
        <td>Nama</td>
        <td>: {{ $pengajuan->user->name }}</td>
    </tr>
    <tr>
        <td>No. Mhs</td>
        <td>: {{ $pengajuan->user->nim }}</td>
    </tr>
    <tr>
        <td>Jurusan/Prodi</td>
        <td>: {{ $pengajuan->user->prodi }}</td>
    </tr>
    <tr>
        <td>Fakultas</td>
        <td>: {{ $pengajuan->user->fakultas }}</td>
    </tr>
</table>

<p class="indent">
Bermaksud mengajukan Beasiswa Umum / Beasiswa Prestasi Khusus sebagaimana telah diumumkan oleh Universitas Muhammadiyah Yogyakarta. Sehubungan dengan hal itu, berikut saya sertakan persyaratan yang diperlukan yang berupa:
</p>

<ol style="margin-left: 50px;">
    @if (!empty($data) && $data->pengajuanPersyaratan)
        @foreach ($data->pengajuanPersyaratan as $item)
            @if ($item->type === 'file')
                <li class="mb-2">
                    <div class="flex items-center gap-3">
                        <span>{{ $item->nama_syarat }}</span>
                        
                        {{-- Tombol Lihat File --}}
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" 
                           class="px-2 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
                            Lihat File
                        </a>

                        {{-- Tombol Download --}}
                        <a href="{{ asset('storage/' . $item->file_path) }}" download 
                           class="px-2 py-1 text-sm bg-green-600 text-white rounded hover:bg-green-700">
                            Download
                        </a>
                    </div>
                </li>
            @endif
        @endforeach
    @else
        <li class="text-gray-500">Surat keterangan bebas Perpustakaan UMY.</li>
        <li class="text-gray-500">Surat keterangan bebas Perpustakaan Daerah.</li>
        <li class="text-gray-500">Surat keterangan bebas pembayaran biaya SPP dan DPP.</li>
        <li class="text-gray-500">Kartu Mahasiswa yang masih berlaku.</li>
    @endif
</ol>


<p class="indent">
Demikian pengajuan beasiswa ini, atas perkenannya saya ucapkan terima kasih.
</p>

<p>Wassalamu’alaikum Wr. Wb.</p>

<br><br>

<p style="text-align: right;">Yogyakarta, {{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('d F Y') }}}</p>
<p style="text-align: right;">Hormat saya,</p>

<br><br><br>

<p style="text-align: right;">{{ $pengajuan->user->name }}</p>
