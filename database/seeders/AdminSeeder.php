<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Slide;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Dosen;
use App\Models\Poster;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin User ──
        User::updateOrCreate(
            ['email' => 'admin@htn.staimas.ac.id'],
            [
                'name'     => 'Admin HTN STAIMAS',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        // ── Slides ──
        Slide::truncate();
        $slides = [
            ['judul' => 'Mahasiswa HTN STAIMAS Wonogiri', 'gambar' => 'slides/slide1.png', 'urutan' => 1, 'aktif' => true],
            ['judul' => 'Kegiatan Perkuliahan HTN',        'gambar' => 'slides/slide2.png', 'urutan' => 2, 'aktif' => true],
        ];
        foreach ($slides as $s) {
            Slide::create($s);
        }

        // ── Kategori Berita ──
        Kategori::truncate();
        $kategoris = [
            ['nama' => 'Kegiatan',   'slug' => 'kegiatan'],
            ['nama' => 'Prestasi',   'slug' => 'prestasi'],
            ['nama' => 'Akademik',   'slug' => 'akademik'],
            ['nama' => 'Pengabdian', 'slug' => 'pengabdian'],
        ];
        foreach ($kategoris as $k) {
            Kategori::create($k);
        }

        $katKegiatan   = Kategori::where('slug', 'kegiatan')->first();
        $katPrestasi   = Kategori::where('slug', 'prestasi')->first();
        $katAkademik   = Kategori::where('slug', 'akademik')->first();
        $katPengabdian = Kategori::where('slug', 'pengabdian')->first();

        // ── Berita ──
        Berita::truncate();
        $beritas = [
            [
                'kategori_id' => $katKegiatan->id,
                'judul'       => 'Pembekalan KKN Mahasiswa HTN Angkatan 2025',
                'slug'        => 'pembekalan-kkn-htn-2025',
                'konten'      => 'Program Studi Hukum Tata Negara (HTN) STAIMAS Wonogiri menyelenggarakan kegiatan pembekalan bagi mahasiswa yang akan melaksanakan Kuliah Kerja Nyata (KKN) Reguler Angkatan 2025. Pembekalan difokuskan pada penguatan pemahaman hukum lokal dan pemberian bantuan hukum ringan kepada masyarakat setempat. Mahasiswa HTN diharapkan mampu berkontribusi nyata dalam penegakan hukum di tingkat masyarakat.',
                'gambar'      => null,
                'tanggal'     => '2026-07-02',
                'aktif'       => true,
            ],
            [
                'kategori_id' => $katPrestasi->id,
                'judul'       => 'Mahasiswa HTN Juara Moot Court Nasional',
                'slug'        => 'juara-moot-court-nasional',
                'konten'      => 'Kabar membanggakan datang dari panggung nasional. Delegasi mahasiswa Program Studi HTN STAIMAS Wonogiri berhasil meraih juara dalam kompetisi peradilan semu (Moot Court) tingkat nasional. Prestasi ini membuktikan bahwa mahasiswa HTN tidak hanya unggul teori ketatanegaraan, tetapi juga terampil dalam praktik berperkara di persidangan.',
                'gambar'      => null,
                'tanggal'     => '2026-06-15',
                'aktif'       => true,
            ],
            [
                'kategori_id' => $katAkademik->id,
                'judul'       => 'Seminar Nasional: Legal Drafting dalam Pembentukan Perda',
                'slug'        => 'seminar-legal-drafting-perda',
                'konten'      => 'Seminar nasional ini menghadirkan pakar hukum tata negara dan anggota DPRD guna membahas teknik penyusunan peraturan daerah (Perda) yang baik dan sesuai asas-asas pembentukan peraturan perundang-undangan. Penguatan kemampuan legal drafting menjadi poin penting yang harus dikuasai mahasiswa HTN modern.',
                'gambar'      => null,
                'tanggal'     => '2026-06-05',
                'aktif'       => true,
            ],
        ];
        foreach ($beritas as $b) {
            Berita::create($b);
        }

        // ── Dosen ──
        Dosen::truncate();
        $dosens = [
            ['nama' => 'Dr. Ahmad Fauzi, S.H., M.H.',      'jabatan' => 'Ketua Program Studi HTN', 'foto' => null, 'urutan' => 1],
            ['nama' => 'Syarif Hidayat, S.H., M.H.',       'jabatan' => 'Dosen Tetap HTN',         'foto' => null, 'urutan' => 2],
            ['nama' => 'Nurul Aini, S.H., M.H.',           'jabatan' => 'Dosen Tetap HTN',         'foto' => null, 'urutan' => 3],
            ['nama' => 'Dr. Bambang Sutrisno, S.H., M.Hum','jabatan' => 'Dosen Tetap HTN',         'foto' => null, 'urutan' => 4],
            ['nama' => 'Fitri Rahayu, S.H., M.H.',         'jabatan' => 'Dosen Tetap HTN',         'foto' => null, 'urutan' => 5],
        ];
        foreach ($dosens as $d) {
            Dosen::create(array_merge($d, ['aktif' => true]));
        }

        // ── Poster ──
        Poster::truncate();
        $posters = [
            ['judul' => 'PMB HTN 2026',        'deskripsi' => 'Buka Pendaftaran Mahasiswa Baru Program Studi HTN',   'gambar' => null, 'kategori' => 'PMB'],
            ['judul' => 'Beasiswa Mahasiswa',   'deskripsi' => 'Info Beasiswa Khusus Mahasiswa HTN Berprestasi',      'gambar' => null, 'kategori' => 'Beasiswa'],
            ['judul' => 'KKN HTN 2026',         'deskripsi' => 'Pendaftaran dan Penempatan KKN Angkatan 2026',        'gambar' => null, 'kategori' => 'Kegiatan'],
            ['judul' => 'Seminar Legal Drafting','deskripsi' => 'Seminar Perancangan Perda – Terbuka Untuk Umum',     'gambar' => null, 'kategori' => 'Akademik'],
        ];
        foreach ($posters as $p) {
            Poster::create(array_merge($p, ['aktif' => true]));
        }
    }
}
