<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Formulir Pengajuan Izin Penelitian</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");
    body {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#d9e6de] to-[#e6e2ec] flex items-start justify-center p-6">
  <div class="absolute top-6 left-6">
    <a href="{{ route('user.dashboard') }}" aria-label="Back to dashboard"
       class="text-black text-xl border border-black rounded-full w-10 h-10 flex items-center justify-center">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>

  <form action="{{ route('store.penelitian') }}" method="POST"
        class="bg-white rounded-xl max-w-4xl w-full p-10 mt-16" aria-label="Formulir Pengajuan Surat Permohonan Izin Penelitian">
    @csrf
    <h1 class="text-center font-extrabold text-lg leading-tight mb-8">
      Formulir Pengajuan<br />Surat Permohonan Izin Penelitian
    </h1>

    <label class="block mb-1 text-sm font-normal text-black">Nama Mahasiswa</label>
    <input type="text" value="{{ auth()->user()->name }}" readonly
           class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

    <label class="block mb-1 text-sm font-normal text-black">Nomor Mahasiswa</label>
    <input type="text" value="{{ auth()->user()->nim }}" readonly
           class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

    <label class="block mb-1 text-sm font-normal text-black">Program Studi</label>
    <input type="text" value="{{ auth()->user()->prodi }}" readonly
           class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

    <label class="block mb-1 text-sm font-normal text-black">Judul TA/Skripsi</label>
    <input type="text" name="judul_ta" required
           class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4" />

    <label class="block mb-1 text-sm font-normal text-black">Dosen Pembimbing 1</label>
    <select name="dosen1" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-4">
      <option value="">-- Pilih Dosen Pembimbing 1 --</option>
      <option>Nurwahyu Alamsyah, S.Kom., M.Kom., M.IM., Ph.D.</option>
      <option>Chayadi Oktomy N S, S.T., M.Eng. ITILF, Ph.D.</option>
      <option>Dr. Nasy’an Taufiq Al Ghifari, S.T., M.T.</option>
      <option>Dr. Ir. Dwijoko Purbohadi, M.T.</option>
      <option>Dr. Reza Giga Isnanda, S.T., M.Sc.</option>
      <option>Ir. Eko Prasetyo, M.Eng., Ph.D.</option>
      <option>Ir. Slamet Riyadi, S.T., M.Sc., Ph.D.</option>
      <option>Cahya Damarjati, S.T. M. Eng., Ph.D.</option>
      <option>Winny Setyonugroho. S.Ked., M.T., Ph.D.</option>
      <option>Ir. Asroni, S.T., M.Eng</option>
      <option>Haris Setyawan, S.T., M.Eng.</option>
      <option>Titis Wisnu Wijaya, S. Pd., M. Pd.</option>
      <option>Asep Setiawan S.Th.I., M.Ud.</option>
      <option>Tri Andi, S.T., M.Kom.</option>
      <option>Aprilia Kurnianti, ST. M. Eng.</option>
      <option>Laila Ma’rifatul Azizah, S.Kom., M.I.M.</option>
      <option>Muhammad Abdul Haq, S.Tr.T., M.Eng.</option>
      <option>Dr.(cand.) Ir. Etik Irijanti., S.T., M.Sc.</option>
    </select>

    <label class="block mb-1 text-sm font-normal text-black">Dosen Pembimbing 2</label>
    <select name="dosen2" required
            class="w-full border border-gray-300 rounded px-3 py-1.5 mb-8">
      <option value="">-- Pilih Dosen Pembimbing 2 --</option>
      <option>Nurwahyu Alamsyah, S.Kom., M.Kom., M.IM., Ph.D.</option>
      <option>Chayadi Oktomy N S, S.T., M.Eng. ITILF, Ph.D.</option>
      <option>Dr. Nasy’an Taufiq Al Ghifari, S.T., M.T.</option>
      <option>Dr. Ir. Dwijoko Purbohadi, M.T.</option>
      <option>Dr. Reza Giga Isnanda, S.T., M.Sc.</option>
      <option>Ir. Eko Prasetyo, M.Eng., Ph.D.</option>
      <option>Ir. Slamet Riyadi, S.T., M.Sc., Ph.D.</option>
      <option>Cahya Damarjati, S.T. M. Eng., Ph.D.</option>
      <option>Winny Setyonugroho. S.Ked., M.T., Ph.D.</option>
      <option>Ir. Asroni, S.T., M.Eng</option>
      <option>Haris Setyawan, S.T., M.Eng.</option>
      <option>Titis Wisnu Wijaya, S. Pd., M. Pd.</option>
      <option>Asep Setiawan S.Th.I., M.Ud.</option>
      <option>Tri Andi, S.T., M.Kom.</option>
      <option>Aprilia Kurnianti, ST. M. Eng.</option>
      <option>Laila Ma’rifatul Azizah, S.Kom., M.I.M.</option>
      <option>Muhammad Abdul Haq, S.Tr.T., M.Eng.</option>
      <option>Dr.(cand.) Ir. Etik Irijanti., S.T., M.Sc.</option>
    </select>

    <div class="flex justify-center">
      <button type="submit" class="border border-green-700 text-green-700 text-xs rounded px-10 py-1.5 hover:bg-green-50 transition">
        Ajukan Surat
      </button>
    </div>
  </form>
</body>
</html>
