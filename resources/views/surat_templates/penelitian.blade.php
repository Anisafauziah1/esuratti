<style>
    @page {
        margin: 2cm;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 11pt;
        line-height: 1.5;
        margin: 0;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-bold {
        font-weight: bold;
    }

    .underline {
        text-decoration: underline;
    }

    table {
        width: 100%;
        margin: 8px 0;
    }

    td {
        vertical-align: top;
        padding: 2px 0;
    }

    .ttd-space {
        height: 60px;
    }

    .ttd-line {
        text-align: right;
        margin-top: -30px;
    }

    .ttd-name {
        text-align: right;
        margin-top: 60px;
    }
</style>

<p>No. : 010/A.5-III/TI/IV/{{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('Y') }}<br>
Lamp. : -<br>
Hal. : <span class="text-bold">Permohonan Izin Penelitian</span></p>

<p>Kepada Yth:<br>
Kepala Biro Sistem Informasi<br>
Universitas Muhammadiyah Yogyakarta<br>
Di Tempat</p>

<p><i>Assalamu’alaikum Warahmatullaahi Wabarakaatuh</i></p>

<p>
Dengan hormat, sebagai salah satu syarat untuk menyelesaikan studi jenjang S-1 di Fakultas Teknik Universitas Muhammadiyah Yogyakarta, setiap mahasiswa diwajibkan untuk melaksanakan Tugas Akhir/Skripsi.
</p>

<p>
Dengan ini kami pengurus jurusan memohon agar mahasiswa tersebut di bawah ini dapat melaksanakan penelitian dan mengambil data di Instansi/Perusahaan yang Bapak Pimpin:
</p>

<table>
    <tr>
        <td style="width: 40%;">Nama Mahasiswa</td>
        <td>: {{ $pengajuan->user->name }}</td>
    </tr>
    <tr>
        <td>Nomor Mahasiswa</td>
        <td>: {{ $pengajuan->user->nim }}</td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td>: {{ $pengajuan->user->prodi }}</td>
    </tr>
    <tr>
        <td>Judul TA/Skripsi</td>
        <td>: </td>
    </tr>
</table>

<p class="text-center text-bold underline" style="margin: 10px 0;">
    {{ optional($pengajuan->persyaratans->firstWhere('nama_syarat', 'Judul TA/Skripsi'))->isian ?? '-' }}
</p>

<table>
    <tr>
        <td style="width: 40%;">Dosen Pembimbing I</td>
        <td>: {{ optional($pengajuan->persyaratans->firstWhere('nama_syarat', 'Dosen Pembimbing 1'))->isian ?? '-' }}</td>
    </tr>
    <tr>
        <td>Dosen Pembimbing II</td>
        <td>: {{ optional($pengajuan->persyaratans->firstWhere('nama_syarat', 'Dosen Pembimbing 2'))->isian ?? '-' }}</td>
    </tr>
</table>
<p>
Demikian permohonan ini kami sampaikan. Atas perhatian dan kerjasamanya diucapkan terima kasih.
</p>

<p><i>Wassalaamu ‘alaikum warahmatullaahi wabarakaatuh.</i></p>

<p class="text-right" style="margin-top: 20px;">
    Yogyakarta, {{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('d F Y') }}<br>
    Ketua Program Studi
</p>

<div class="ttd-space"></div>

<p class="ttd-line">(......................................................)</p>
