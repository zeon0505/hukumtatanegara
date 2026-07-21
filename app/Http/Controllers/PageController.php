<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Berita;
use App\Models\Dosen;
use App\Models\Poster;
use App\Models\Kategori;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'slides'  => Slide::where('aktif', true)->orderBy('urutan')->get(),
            'beritas' => Berita::with('kategori')->where('aktif', true)->latest('tanggal')->take(3)->get(),
            'dosens'  => Dosen::where('aktif', true)->orderBy('urutan')->take(4)->get(),
        ]);
    }

    public function visiMisi()
    {
        return view('pages.visi-misi', [
            'title'    => 'Visi & Misi HTN',
            'subtitle' => 'Visi Keilmuan, Misi, Tujuan, dan Strategi Program Studi S1 HTN STAIMAS Wonogiri',
        ]);
    }

    public function dosen()
    {
        return view('pages.dosen', [
            'title'    => 'Dosen Pengajar HTN',
            'subtitle' => 'Profil dosen pengajar dan pembimbing akademik Program Studi HTN',
            'dosens'   => Dosen::where('aktif', true)->orderBy('urutan')->get(),
        ]);
    }

    public function dosenShow($slug)
    {
        $dosen = Dosen::where('slug', $slug)->where('aktif', true)->firstOrFail();

        return view('pages.dosen-detail', [
            'title'    => $dosen->nama,
            'subtitle' => 'Profil Lengkap Dosen',
            'dosen'    => $dosen,
        ]);
    }

    public function kurikulum()
    {
        return view('pages.kurikulum', [
            'title'    => 'Kurikulum HTN',
            'subtitle' => 'Struktur mata kuliah dan kurikulum akademik Program Studi S1 HTN',
        ]);
    }

    public function berita(Request $request)
    {
        $query = Berita::with('kategori')->where('aktif', true)->latest('tanggal');

        if ($request->filled('kategori')) {
            $query->whereHas('kategori', fn($q) => $q->where('slug', $request->kategori));
        }

        return view('pages.berita', [
            'title'     => 'Berita & Kegiatan HTN',
            'subtitle'  => 'Kumpulan berita terbaru, rilis pers, dan artikel ilmiah prodi HTN',
            'beritas'   => $query->get(),
            'kategoris' => Kategori::withCount('beritas')->get(),
            'posters'   => Poster::where('aktif', true)->latest()->get(),
        ]);
    }

    public function beritaShow($slug)
    {
        $berita = Berita::with('kategori')->where('slug', $slug)->where('aktif', true)->firstOrFail();

        $related = Berita::with('kategori')
            ->where('aktif', true)
            ->where('id', '!=', $berita->id)
            ->when($berita->kategori_id, fn($q) => $q->where('kategori_id', $berita->kategori_id))
            ->latest('tanggal')
            ->take(2)
            ->get();

        $prev = Berita::where('aktif', true)
            ->where('tanggal', '<', $berita->tanggal)
            ->orderBy('tanggal', 'desc')
            ->first();

        $next = Berita::where('aktif', true)
            ->where('tanggal', '>', $berita->tanggal)
            ->orderBy('tanggal', 'asc')
            ->first();

        $otherBeritas = Berita::where('aktif', true)
            ->where('id', '!=', $berita->id)
            ->latest('tanggal')
            ->take(5)
            ->get();

        return view('pages.berita-detail', [
            'title'    => $berita->judul,
            'subtitle' => 'Diterbitkan pada ' . \Carbon\Carbon::parse($berita->tanggal)->isoFormat('D MMMM Y'),
            'berita'   => $berita,
            'related'  => $related,
            'prev'     => $prev,
            'next'     => $next,
            'otherBeritas' => $otherBeritas,
        ]);
    }

    public function pengumuman()
    {
        return view('pages.pengumuman', [
            'title'   => 'Poster & Pengumuman HTN',
            'subtitle' => 'Pengumuman resmi dan poster informasi dari Prodi HTN STAIMAS Wonogiri',
            'posters' => \App\Models\Poster::where('aktif', true)->latest()->get(),
        ]);
    }

    public function pengumumanShow($key)
    {
        $poster = \App\Models\Poster::where('aktif', true)
            ->where(function($q) use ($key) {
                $q->where('slug', $key)->orWhere('id', $key);
            })
            ->firstOrFail();

        $otherPosters = \App\Models\Poster::where('aktif', true)
            ->where('id', '!=', $poster->id)
            ->latest()->take(4)->get();

        return view('pages.pengumuman-detail', [
            'title'        => $poster->judul,
            'subtitle'     => 'Dipublikasikan pada ' . $poster->created_at->isoFormat('D MMMM Y'),
            'poster'       => $poster,
            'otherPosters' => $otherPosters,
        ]);
    }

    public function akreditasi()
    {
        return view('pages.akreditasi', [
            'title'    => 'Akreditasi HTN',
            'subtitle' => 'Sertifikat Akreditasi Program Studi Hukum Tata Negara STAIMAS Wonogiri',
        ]);
    }
}
