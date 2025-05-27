<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumentasi API Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">📘 Dokumentasi API Mahasiswa SIMPADU</h1>
    <p><strong>Base URL:</strong> <code>http://36.91.27.150:818/api</code></p>

    <h2 class="mt-5">📌 Endpoint</h2>

    <div class="mb-4">
        <h4><code>GET /mahasiswa</code></h4>
        <p><strong>Deskripsi:</strong> Ambil semua data mahasiswa</p>
        <p><strong>Response:</strong> 200 OK - JSON array berisi objek Mahasiswa</p>
    </div>

    <div class="mb-4">
        <h4><code>GET /mahasiswa/list_mahasiswa</code></h4>
        <p><strong>Deskripsi:</strong> Ambil daftar nama dan NIM mahasiswa</p>
        <p><strong>Response:</strong> 200 OK - JSON array berisi objek MahasiswaSimple</p>
    </div>

    <h2 class="mt-5">📦 Skema</h2>

    <h4 class="mt-3">🔹 MahasiswaSimple</h4>
    <ul>
        <li><strong>nim:</strong> string (contoh: <code>C030876501</code>)</li>
        <li><strong>nama_mhs:</strong> string (contoh: <code>King Laravel</code>)</li>
    </ul>

    <h4 class="mt-4">🔸 Mahasiswa (lengkap)</h4>
    <ul>
        <li><strong>nim:</strong> string</li>
        <li><strong>id_kategori_spp:</strong> integer</li>
        <li><strong>thn_ak_masuk:</strong> string</li>
        <li><strong>thn_ak_lulus:</strong> string</li>
        <li><strong>nama_mhs:</strong> string</li>
        <li><strong>nik_mhs:</strong> string</li>
        <li><strong>nisn:</strong> string</li>
        <li><strong>id_status_mhs:</strong> string</li>
        <li><strong>id_prodi:</strong> integer</li>
        <li><strong>id_jk:</strong> integer</li>
        <li><strong>id_darah:</strong> integer</li>
        <li><strong>warga_negara:</strong> string</li>
        <li><strong>kebangsaan:</strong> string</li>
        <li><strong>tempat_lahir:</strong> string</li>
        <li><strong>tgl_lahir:</strong> string (format: date)</li>
        <li><strong>id_agama:</strong> integer</li>
        <li><strong>id_status_sipil:</strong> string</li>
        <li><strong>id_wil:</strong> string</li>
        <li><strong>id_kabupaten:</strong> string</li>
        <li><strong>id_prov:</strong> string</li>
        <li><strong>handphone:</strong> string</li>
        <li><strong>email:</strong> string (format: email)</li>
        <li><strong>sekolah_asal:</strong> string</li>
        <li><strong>id_jurusan_sekolah:</strong> integer</li>
        <li><strong>nilai_sekolah:</strong> float</li>
        <li><strong>tgl_lulus:</strong> string (format: date)</li>
        <li><strong>IPK:</strong> string</li>
        <li><strong>foto_profile, foto_ktp, foto_ijasah, foto_transkip, foto_kk, foto_ak, foto_sehat, foto_warna:</strong> string</li>
        <li><strong>created_at, updated_at:</strong> string (format: date-time)</li>
        <li><strong>foto_*_url:</strong> string (format: uri)</li>
        <li><strong>status:</strong> string (nullable)</li>
    </ul>
</div>
</body>
</html>
