<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <style>
    @page {
      size: 210mm 330mm; /* Ukuran F4: 21cm x 33cm */
      margin: 2.5cm;
    }

    body {
      font-family: "Times New Roman", serif;
      font-size: 11pt;
      line-height: 1.5;
    }

    .text-center { text-align: center; }
    .text-bold { font-weight: bold; }
    .signature-space { margin-top: 40px; }
    table { width: 100%; }
    td { vertical-align: top; padding-bottom: 4px; }
    ol { padding-left: 1.2em; margin: 0.5em 0; }
    .note {
      border-top: 1px solid #000;
      font-size: 9pt;
      margin-top: 20px;
      padding-top: 4px;
      text-align: center;
    }
  </style>
</head>
<body>

  <p class="text-center text-bold" style="text-decoration: underline;">SURAT PERMOHONAN PINDAH PROGRAM STUDI</p>

  <p>
    Kepada Yth.<br>
    Rektor<br>
    Cq. Kepala Biro Akademik<br>
    Universitas Muhammadiyah Yogyakarta<br>
    Di Tempat
  </p>

  <p>Assalaamu’alaikum Wr. Wb</p>

  <p>Saya yang bertanda tangan di bawah ini:</p>

  <table>
    <tr><td width="35%">Nama Mahasiswa</td><td>: {{ $pengajuan->user->name }}</td></tr>
    <tr><td>Nomor Mahasiswa</td><td>: {{ $pengajuan->user->nim }}</td></tr>
    <tr><td>Fakultas</td><td>: {{ $pengajuan->user->fakultas }}</td></tr>
    <tr><td>Program Studi</td><td>: {{ $pengajuan->user->prodi }}</td></tr>
    <tr><td>Semester</td><td>: {{ $pengajuan->user->semester }}</td></tr>
    <tr>
    <td>Tahun Akademik
        <td>:
            {{
            optional(
                $pengajuan->persyaratans->firstWhere('nama_syarat', 'Tahun Akademik')
            )->isian ?? '-'
            }}
        </td>
    </tr>
  </table>

  <p>
    Mengajukan permohonan pindah program studi dari Universitas Muhammadiyah Yogyakarta ke: ...........................................................
  </p>

  <p>Bersama ini saya lampirkan:</p>
  <ol>
    <li>Surat keterangan bebas Perpustakaan UMY.</li>
    <li>Surat keterangan bebas Perpustakaan Daerah.</li>
    <li>Surat keterangan bebas pembayaran biaya SPP dan DPP.</li>
    <li>Kartu Mahasiswa yang masih berlaku.</li>
  </ol>

  <p>
    Demikian surat permohonan ini saya sampaikan. Atas perhatian dan kerjasamanya saya ucapkan terima kasih.
  </p>

  <p>Wassalaamu’alaikum Wr. Wb</p>

  <table style="margin-top: 1.5em;">
    <tr>
      <td class="text-center">
        Mengetahui,<br>
        Ketua / Sekretaris Jurusan
        <div style="margin-top: 50px;">( ....................................... )</div>
      </td>
      <td class="text-center">
        Yogyakarta, {{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('d F Y') }}<br>
        Hormat saya,
        <div style="margin-top: 50px;">( {{ $pengajuan->user->name }}
 )</div>
      </td>
    </tr>
  </table>

  <div class="text-center signature-space">
    Mengetahui,<br>
    Dekan / Wakil Dekan
    <div style="margin-top: 40px;">( ....................................... )</div>
  </div>

  <div class="note">
    Permohonan ini segera diserahkan ke Biro Akademik untuk diterbitkan Surat Pindah Program Studi
  </div>

</body>
</html>
