<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 11pt;
        line-height: 1.4;
        margin: 30px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }

    td, th {
        padding: 3px;
        vertical-align: top;
    }

    .bordered-table {
        border: 1px solid black;
    }

    .bordered-table th, .bordered-table td {
        border: 1px solid black;
        text-align: left;
    }

    .signature {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .signature div {
        width: 48%;
        text-align: center;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .mt-5 {
        margin-top: 5px;
    }
</style>

<p class="text-center"><strong>PERMOHONAN SEMINAR KERJA PRAKTEK</strong></p>

<p>Kepada Yth:<br>
Ketua Program Studi S1 Teknik<br>
Fakultas Teknik Universitas Muhammadiyah Yogyakarta</p>

<p><i>Assalaamu’alaikum warahmatullaahi wabarakaatuh</i></p>

<p>Yang bertanda tangan di bawah ini:</p>

<table>
    <tr>
        <td style="width: 180px;">Nama Mahasiswa</td>
        <td>: {{ $pengajuan->user->name }}</td>
    </tr>
    <tr>
        <td>Nomor Mahasiswa</td>
        <td>: {{ $pengajuan->user->nim }}</td>
    </tr>
    <tr>
        <td>Lokasi KP</td>
        <td>: {{ $data['Lokasi']->isian ?? '-' }}</td>
    </tr>
    <tr>
        <td>Judul KP</td>
        <td>: {{ $data['Judul SKP']->isian ?? '-' }}</td>
    </tr>
</table>

<p class="mt-5">
Mengajukan permohonan untuk dapat melaksanakan Seminar Kerja Praktek yang insyaAllah akan dilaksanakan pada:
</p>

<table class="bordered-table">
    <thead>
        <tr>
            <th style="width: 33%;">Hari</th>
            <th style="width: 33%;">Tanggal</th>
            <th style="width: 33%;">Jam</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">{{ $data['Hari']->isian ?? '-' }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($data['Tanggal']->isian ?? now())->translatedFormat('d F Y') }}</td>
            <td class="text-center">{{ $data['Jam']->isian ?? '-' }}</td>
        </tr>
    </tbody>
</table>

<p class="mt-5">
Demikian surat permohonan ini saya sampaikan, atas perhatiannya saya ucapkan terima kasih.
</p>

<p><i>Wassalaamu’alaikum warahmatullaahi wabarakaatuh</i></p>

<table style="width: 100%; margin-top: 40px; text-align: center;">
    <tr>
        <td>
            Mengetahui,<br>
            Dosen Pembimbing<br><br><br><br>
            ( ............................................. )
        </td>
        <td>
            Yogyakarta, {{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('d F Y') }}<br>
            Hormat saya,<br><br><br><br>
            ( {{ $pengajuan->user->name }} )
        </td>
    </tr>
</table>


<p class="mt-20 text-bold">Persyaratan:</p>
<table class="bordered-table">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 75%;">Persyaratan</th>
            <th style="width: 20%;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">1.</td>
            <td>Surat Selesai KP dari Lokasi/Instansi</td>
            <td></td>
        </tr>
    </tbody>
</table>
