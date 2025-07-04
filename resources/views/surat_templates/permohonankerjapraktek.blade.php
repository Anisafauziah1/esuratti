<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Permohonan Kerja Praktek</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 50px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .judul {
            font-size: 16pt;
            font-weight: bold;
            text-decoration: underline;
        }

        .isi {
            text-align: justify;
        }

        .ttd {
            margin-top: 50px;
            width: 100%;
        }

        .ttd td {
            vertical-align: top;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="judul">Permohonan Kerja Praktek</div>
        <div>Yth. Pimpinan Instansi Terkait</div>
    </div>

    <div class="isi">
        <p>Dengan hormat,</p>

        <p>Yang bertanda tangan di bawah ini:</p>
        <table>
            <tr>
                <td style="width: 200px">Nama Mahasiswa</td>
                <td>: {{ $pengajuan->user->name }}</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: {{ $pengajuan->user->nim }}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>: {{ $pengajuan->user->prodi }}</td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>: {{ $pengajuan->user->fakultas }}</td>
            </tr>
        </table>

        <p>Dengan ini mengajukan permohonan untuk melaksanakan kerja praktek pada instansi yang Bapak/Ibu pimpin. Adapun
            data tambahan sebagai berikut:</p>

        @php
            $get = fn($label) => optional($pengajuan->persyaratans->firstWhere('nama_syarat', $label))->isian;
        @endphp

        <table>
            <tr>
                <td style="width: 200px">Alamat Asal</td>
                <td>: {{ $get('Alamat Asal') }}</td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>: {{ $get('Nomor Telepon') }}</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>: {{ $get('Tempat/Tanggal Lahir') }}</td>
            </tr>
            <tr>
                <td>IPK</td>
                <td>: {{ $pengajuan->user->ipk }}</td>
            </tr>
            <tr>
                <td>Jumlah SKS</td>
                <td>: {{ $pengajuan->user->sks }}</td>
            </tr>
        </table>

        <p>Demikian surat permohonan ini saya buat, atas perhatian dan kebijaksanaannya saya ucapkan terima kasih.</p>
    </div>

    <table class="ttd">
        <tr>
            <td style="width: 60%"></td>
            <td>
                Yogyakarta, {{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('d F Y') }}<br>
                Pemohon,<br><br><br><br>
                <u>{{ $pengajuan->user->name }}</u><br>
                NIM: {{ $pengajuan->user->nim }}
            </td>
        </tr>
    </table>
</body>

</html>
