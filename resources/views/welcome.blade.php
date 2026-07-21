@extends('layouts.app')

@section('content')
<div class="space-y-16">
  <!-- HERO CAROUSEL -->
  <section class="carousel-container min-h-[50vh] md:min-h-[70vh] bg-teal-900 rounded-3xl overflow-hidden relative -mt-6" id="beranda">
    <div class="carousel-track" id="carousel-track">
      @forelse($slides as $slide)
      @php
        $imgUrl = str_starts_with($slide->gambar, 'http') ? $slide->gambar : asset('storage/' . $slide->gambar);
      @endphp
      <div class="carousel-slide relative min-h-[50vh] md:min-h-[70vh] flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ $imgUrl }}')">
        <div class="absolute inset-0 bg-black/30 z-0"></div>
      </div>
      @empty
      <div class="carousel-slide relative min-h-[50vh] md:min-h-[70vh] flex items-center justify-center bg-teal-900">
        <p class="text-teal-300 text-sm">Belum ada slide. <a href="{{ route('admin.slides.create') }}" class="underline">Tambah di admin</a>.</p>
      </div>
      @endforelse
    </div>
    <button class="absolute top-1/2 left-4 -translate-y-1/2 w-10 h-10 rounded-full bg-black/30 hover:bg-black/50 text-white flex items-center justify-center focus:outline-none transition-all" id="carousel-prev"><i class="fas fa-chevron-left"></i></button>
    <button class="absolute top-1/2 right-4 -translate-y-1/2 w-10 h-10 rounded-full bg-black/30 hover:bg-black/50 text-white flex items-center justify-center focus:outline-none transition-all" id="carousel-next"><i class="fas fa-chevron-right"></i></button>
  </section>

  <!-- Introduction Box -->
  <div class="bg-gradient-to-br from-teal-800 to-teal-900 rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(201,168,76,0.15),transparent_60%)]"></div>
    <div class="relative z-10 max-w-3xl space-y-4">
      <span class="inline-block bg-yellow-500/20 text-yellow-300 border border-yellow-500/30 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">S1 – Hukum Tata Negara</span>
      <h2 class="text-3xl sm:text-4xl font-black leading-tight">HTN STAIMAS Wonogiri: Mencetak Sarjana Hukum Tata Negara yang Unggul dan Profesional</h2>
      <p class="text-teal-100 text-sm sm:text-base leading-relaxed">
        Ingin menjadi praktisi hukum, konsultan konstitusi, atau ahli hukum tata negara yang andal? Program Studi Hukum Tata Negara (HTN) STAIMAS Wonogiri adalah tempatmu! Bergabunglah dan raih karier di bidang hukum, peradilan, instansi pemerintah, dan lembaga negara dengan pondasi nilai-nilai Islam yang kokoh.
      </p>
      <div class="pt-4 flex flex-wrap gap-4">
        <a href="https://staimaswonogiri.ecampuz.com/eadmisi/" target="_blank" class="bg-yellow-500 hover:bg-yellow-600 text-gray-950 font-bold px-6 py-3 rounded-xl text-sm transition-all shadow-md shadow-yellow-500/20 flex items-center gap-2">
          <i class="fas fa-user-plus"></i> Daftar PMB HTN 2026
        </a>
        <a href="{{ route('pages.kurikulum') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold px-6 py-3 rounded-xl text-sm transition-all flex items-center gap-2">
          <i class="fas fa-file-download"></i> Kurikulum HTN
        </a>
      </div>
    </div>
  </div>

  <!-- Visi, Misi, Tujuan, Strategi Tabs -->
  <div id="visi-misi" class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-sm space-y-6">
    <div class="border-b border-gray-100">
      <div class="flex overflow-x-auto gap-4 sm:gap-8 pb-px no-scrollbar">
        <button onclick="switchTab('visi')" id="tab-visi" class="tab-btn pb-4 text-sm font-bold text-teal-700 border-b-2 border-teal-700 transition-all whitespace-nowrap focus:outline-none">
          Visi Keilmuan
        </button>
        <button onclick="switchTab('misi')" id="tab-misi" class="tab-btn pb-4 text-sm font-bold text-gray-400 hover:text-teal-700 border-b-2 border-transparent transition-all whitespace-nowrap focus:outline-none">
          Misi Keilmuan
        </button>
        <button onclick="switchTab('tujuan')" id="tab-tujuan" class="tab-btn pb-4 text-sm font-bold text-gray-400 hover:text-teal-700 border-b-2 border-transparent transition-all whitespace-nowrap focus:outline-none">
          Tujuan
        </button>
        <button onclick="switchTab('strategi')" id="tab-strategi" class="tab-btn pb-4 text-sm font-bold text-gray-400 hover:text-teal-700 border-b-2 border-transparent transition-all whitespace-nowrap focus:outline-none">
          Strategi
        </button>
      </div>
    </div>

    <!-- Tab Contents -->
    <div class="min-h-[200px]">
      <!-- VISI -->
      <div id="content-visi" class="tab-content block space-y-4 animate-fadeIn">
        <div class="bg-teal-50/50 border-l-4 border-teal-600 p-6 rounded-r-2xl">
          <h4 class="font-bold text-gray-800 text-lg mb-2">Visi Keilmuan Program Studi HTN</h4>
          <p class="text-gray-700 text-sm leading-relaxed italic">
            "Menjadi program studi unggulan dalam menghasilkan sarjana Hukum Tata Negara yang profesional, kreatif, berkarakter Islami, dan mampu menjawab tantangan bidang Hukum Tata Negara berbasis nilai-nilai keindonesiaan dan keislaman."
          </p>
        </div>
      </div>

      <!-- MISI -->
      <div id="content-misi" class="tab-content hidden space-y-4 animate-fadeIn">
        <h4 class="font-bold text-gray-800 text-lg">Misi Keilmuan Program Studi HTN</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach([
            'Menyelenggarakan pendidikan dan pembelajaran inovatif untuk menghasilkan lulusan KPI yang kompeten di bidang hukum tata negara, hukum administrasi negara, dan peradilan.',
            'Menyelenggarakan penelitian dan pengabdian kepada masyarakat di bidang Hukum Tata Negara.',
            'Memperluas kerjasama nasional dan internasional di bidang hukum, pemerintahan, dan lembaga negara untuk meningkatkan kompetensi lulusan prodi HTN.',
            'Mengembangkan soft skills dan hard skills lulusan KPI terutama di bidang legal drafting, advokasi hukum, dan kemahiran peradilan.'
          ] as $i => $misi)
          <div class="p-5 bg-gray-50 rounded-2xl flex gap-3">
            <span class="w-8 h-8 rounded-xl bg-teal-100 text-teal-700 text-sm font-bold flex items-center justify-center flex-shrink-0">{{ $i + 1 }}</span>
            <p class="text-gray-600 text-sm leading-relaxed">{{ $misi }}</p>
          </div>
          @endforeach
        </div>
      </div>

      <!-- TUJUAN -->
      <div id="content-tujuan" class="tab-content hidden space-y-4 animate-fadeIn">
        <h4 class="font-bold text-gray-800 text-lg">Tujuan Program Studi KPI</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach([
            'Menghasilkan lulusan KPI yang kompeten di bidang Ilmu Hukum Tata Negara serta mampu berdakwah secara efektif di era digital.',
            'Menghasilkan proses perkuliahan, penelitian dan pengabdian masyarakat pada prodi HTN untuk mengembangkan lulusan yang profesional di bidang Hukum Tata Negara.',
            'Menghasilkan lulusan prodi HTN yang memiliki karakter Islami, kreatif, dan inovatif dengan berlandaskan etika profesi hukum.',
            'Menjalin kerjasama dengan lembaga peradilan, instansi pemerintah, dan kantor hukum dalam lingkup regional, nasional, dan internasional.'
          ] as $i => $tujuan)
          <div class="p-5 bg-gray-50 rounded-2xl flex gap-3">
            <span class="w-8 h-8 rounded-xl bg-teal-100 text-teal-700 text-sm font-bold flex items-center justify-center flex-shrink-0">{{ $i + 1 }}</span>
            <p class="text-gray-600 text-sm leading-relaxed">{{ $tujuan }}</p>
          </div>
          @endforeach
        </div>
      </div>

      <!-- STRATEGI -->
      <div id="content-strategi" class="tab-content hidden space-y-4 animate-fadeIn">
        <h4 class="font-bold text-gray-800 text-lg">Strategi Program Studi HTN</h4>
        <div class="space-y-3">
          @foreach([
            'Meningkatkan standar mutu pendidikan, pembelajaran, penelitian dan pengabdian kepada masyarakat dalam bidang Hukum Tata Negara yang berintegritas dan modern.',
            'Meningkatkan capaian prestasi dan lulusan mahasiswa prodi HTN pada tingkat nasional dan internasional di bidang komunikasi dan media Islam.',
            'Meningkatkan layanan kelembagaan prodi HTN dan kerjasama dengan media massa serta lembaga penyiaran.',
            'Meningkatkan kualifikasi dan kompetensi dosen dalam menguasai materi penelitian dan pengabdian di bidang hukum tata negara dan hukum acara peradilan.',
            'Meningkatkan kualitas sarana prasarana laboratorium peradilan semu (moot court) dan klinik hukum untuk mendukung proses pembelajaran KPI.'
          ] as $i => $strategi)
          <div class="p-4 bg-gray-50 rounded-xl flex items-center gap-4">
            <i class="fas fa-check-circle text-teal-600 flex-shrink-0 text-lg"></i>
            <p class="text-gray-700 text-sm leading-relaxed">{{ $strategi }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- BERITA TERBARU KPI -->
  <div class="space-y-6">
    <div class="flex justify-between items-end">
      <div class="space-y-2">
        <h3 class="text-2xl font-bold text-gray-800">Berita & Kegiatan HTN</h3>
        <p class="text-sm text-gray-500">Kabar terbaru, prestasi mahasiswa, dan artikel seputar HTN STAIMAS Wonogiri.</p>
      </div>
      <a href="{{ route('pages.berita') }}" class="text-sm font-semibold text-teal-700 hover:text-teal-900 flex items-center gap-1">Lihat Semua Berita <i class="fas fa-arrow-right text-[10px]"></i></a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @forelse($beritas as $b)
      <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
        <div class="aspect-video w-full bg-teal-800 flex items-center justify-center relative overflow-hidden">
          @if($b->gambar)
          <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}" class="w-full h-full object-cover">
          @else
          <div class="absolute inset-0 bg-gradient-to-br from-teal-700 to-teal-900"></div>
          <span class="relative z-10 px-4 text-center text-sm font-semibold text-teal-200">{{ $b->judul }}</span>
          @endif
        </div>
        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
          <div class="space-y-2">
            <div class="flex items-center gap-2">
              @if($b->kategori)<span class="text-[11px] font-bold text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full">{{ $b->kategori->nama }}</span>@endif
              <span class="text-xs text-gray-400">{{ $b->tanggal->isoFormat('D MMM Y') }}</span>
            </div>
            <h4 class="font-bold text-gray-800 text-base leading-snug hover:text-teal-700 transition-colors">
              <a href="{{ route('pages.berita.show', $b->slug) }}">{{ $b->judul }}</a>
            </h4>
            <p class="text-xs text-gray-500 leading-relaxed">{{ Str::limit(strip_tags($b->konten), 90) }}</p>
          </div>
          <a href="{{ route('pages.berita.show', $b->slug) }}" class="text-xs font-bold text-teal-700 hover:underline flex items-center gap-1">Baca Selengkapnya <i class="fas fa-arrow-right text-[10px]"></i></a>
        </div>
      </div>
      @empty
      <div class="col-span-3 py-10 text-center text-gray-400 text-sm">Belum ada berita. Tambahkan melalui <a href="{{ route('admin.beritas.create') }}" class="text-teal-700 underline">admin panel</a>.</div>
      @endforelse
    </div>
  </div>

  <!-- Dosen Pengajar HTN -->
  <div id="dosen" class="space-y-6">
    <div class="text-center max-w-xl mx-auto space-y-2">
      <h3 class="text-2xl font-bold text-gray-800">Dosen Pengajar HTN</h3>
      <p class="text-sm text-gray-500">Profil para dosen profesional yang siap membimbing dan menginspirasi langkah akademismu.</p>
    </div>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
      @forelse($dosens as $d)
      <a href="{{ $d->slug ? route('pages.dosen.show', $d->slug) : '#' }}" class="block bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow text-center p-4 group">
        <div class="aspect-[3/4] w-full rounded-xl overflow-hidden mb-3 bg-gray-50">
          @if($d->foto)
          <img src="{{ str_starts_with($d->foto, 'http') ? $d->foto : asset('storage/' . $d->foto) }}" alt="{{ $d->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          @else
          <div class="w-full h-full bg-teal-100 flex items-center justify-center"><i class="fas fa-user text-teal-400 text-2xl"></i></div>
          @endif
        </div>
        <h4 class="font-bold text-gray-800 text-sm leading-snug">{{ $d->nama }}</h4>
        <p class="text-xs text-gray-400 mt-1">{{ $d->jabatan }}</p>
      </a>
      @empty
      <div class="col-span-4 py-8 text-center text-gray-400 text-sm">Belum ada data dosen.</div>
      @endforelse
    </div>
  </div>

  <!-- Kurikulum / Download Section -->
  <div id="kurikulum" class="bg-gray-100/70 border border-gray-200/50 rounded-3xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
    <div class="flex items-center gap-4">
      <div class="w-14 h-14 bg-teal-600 text-white rounded-2xl flex items-center justify-center text-xl shadow-lg shadow-teal-600/10">
        <i class="fas fa-file-pdf"></i>
      </div>
      <div>
        <h4 class="font-bold text-gray-800 text-lg">Struktur Kurikulum HTN</h4>
        <p class="text-sm text-gray-500">Download struktur kurikulum mata kuliah program studi Hukum Tata Negara.</p>
      </div>
    </div>
    <a href="{{ route('pages.kurikulum') }}" class="w-full md:w-auto bg-teal-700 hover:bg-teal-800 text-white font-bold px-8 py-3.5 rounded-xl text-sm shadow transition-colors flex items-center justify-center gap-2">
      <i class="fas fa-cloud-download-alt"></i> Lihat Kurikulum
    </a>
  </div>

  <!-- Contact & Map Section -->
  <div id="kontak" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start pt-6">
    <div class="lg:col-span-7 bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
      <h3 class="font-bold text-gray-900 text-lg mb-6">Ajukan Pertanyaan</h3>
      <form class="space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <input type="text" placeholder="Nama Lengkap" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-sm focus:outline-none focus:border-teal-500" required />
          <input type="tel" placeholder="Nomor Telepon/WA" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-sm focus:outline-none focus:border-teal-500" />
        </div>
        <input type="email" placeholder="Alamat Email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-sm focus:outline-none focus:border-teal-500" required />
        <textarea rows="4" placeholder="Tulis pesan Anda..." class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-sm focus:outline-none focus:border-teal-500" required></textarea>
        <button type="submit" class="w-full bg-teal-700 hover:bg-teal-800 text-white font-bold py-3.5 rounded-lg shadow transition-colors">Kirim Pesan</button>
      </form>
    </div>

    <div class="lg:col-span-5 space-y-4">
      <div class="bg-white rounded-2xl border border-gray-100 p-5 flex gap-4 shadow-sm">
        <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-teal-700 text-lg shrink-0"><i class="fas fa-map-marker-alt"></i></div>
        <div>
          <h4 class="font-bold text-gray-900 text-sm">Alamat Kampus</h4>
          <p class="text-xs text-gray-500 mt-1">Jl. Cempaka 6, Wonoboyo, Kec. Wonogiri, Wonogiri, Jawa Tengah 57615</p>
        </div>
      </div>
      <div class="bg-white rounded-2xl border border-gray-100 p-5 flex gap-4 shadow-sm">
        <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-teal-700 text-lg shrink-0"><i class="fab fa-whatsapp"></i></div>
        <div>
          <h4 class="font-bold text-gray-900 text-sm">WhatsApp</h4>
          <p class="text-xs text-gray-500 mt-1">082223204552</p>
        </div>
      </div>

      <div class="kontak-map rounded-2xl overflow-hidden shadow-sm border border-gray-100">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2044.960527882958!2d110.93878935266353!3d-7.813874308778577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a2e51f116d5bb%3A0x26cbc235ed5a2edc!2sSTAIMAS%20(Sekolah%20Tinggi%20Agama%20Islam%20Mulia%20Astuti)!5e1!3m2!1sid!2sid!4v1741595178278!5m2!1sid!2sid"
          width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Lokasi Kampus HTN STAIMAS"></iframe>
      </div>
    </div>
  </div>
</div>

<script>
  function switchTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(content => {
      content.classList.add('hidden');
      content.classList.remove('block');
    });

    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('text-teal-700', 'border-teal-700');
      btn.classList.add('text-gray-400', 'border-transparent');
    });

    const activeContent = document.getElementById('content-' + tabId);
    if (activeContent) {
      activeContent.classList.remove('hidden');
      activeContent.classList.add('block');
    }

    const activeBtn = document.getElementById('tab-' + tabId);
    if (activeBtn) {
      activeBtn.classList.remove('text-gray-400', 'border-transparent');
      activeBtn.classList.add('text-teal-700', 'border-teal-700');
    }
  }
</script>

<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(4px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn {
    animation: fadeIn 0.3s ease-out forwards;
  }

  /* Carousel */
  .carousel-container { position: relative; }
  .carousel-track { display: flex; transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
  .carousel-slide { flex: 0 0 100%; }
</style>

<script>
  // Carousel
  (function() {
    const track = document.getElementById('carousel-track');
    const slides = track?.querySelectorAll('.carousel-slide');
    if (!slides || slides.length === 0) return;
    let current = 0;
    const total = slides.length;

    function goTo(index) {
      current = (index + total) % total;
      track.style.transform = `translateX(-${current * 100}%)`;
    }

    document.getElementById('carousel-prev')?.addEventListener('click', () => goTo(current - 1));
    document.getElementById('carousel-next')?.addEventListener('click', () => goTo(current + 1));

    // Auto play
    setInterval(() => goTo(current + 1), 5000);
  })();
</script>
@endsection

