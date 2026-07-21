@extends('layouts.app')

@section('content')
<div class="space-y-10">

  {{-- Tab Navigation --}}
  <div class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-sm space-y-6">
    <div class="border-b border-gray-100">
      <div class="flex overflow-x-auto gap-4 sm:gap-8 pb-px no-scrollbar">
        <button onclick="switchTab('visi')" id="tab-visi" class="tab-btn pb-4 text-sm font-bold text-teal-700 border-b-2 border-teal-700 whitespace-nowrap focus:outline-none">Visi Keilmuan</button>
        <button onclick="switchTab('misi')" id="tab-misi" class="tab-btn pb-4 text-sm font-bold text-gray-400 hover:text-teal-700 border-b-2 border-transparent whitespace-nowrap focus:outline-none">Misi Keilmuan</button>
        <button onclick="switchTab('tujuan')" id="tab-tujuan" class="tab-btn pb-4 text-sm font-bold text-gray-400 hover:text-teal-700 border-b-2 border-transparent whitespace-nowrap focus:outline-none">Tujuan</button>
        <button onclick="switchTab('strategi')" id="tab-strategi" class="tab-btn pb-4 text-sm font-bold text-gray-400 hover:text-teal-700 border-b-2 border-transparent whitespace-nowrap focus:outline-none">Strategi</button>
      </div>
    </div>

    <div class="min-h-[250px]">
      {{-- VISI --}}
      <div id="content-visi" class="tab-content block space-y-4">
        <div class="bg-teal-50 border-l-4 border-teal-600 p-6 rounded-r-2xl">
          <h2 class="font-bold text-gray-800 text-xl mb-3">Visi Keilmuan Program Studi HTN</h2>
          <p class="text-gray-700 text-base leading-relaxed italic">
            "Menjadi program studi unggulan dalam menghasilkan sarjana Hukum Tata Negara yang profesional, kreatif, berkarakter Islami, dan mampu menjawab tantangan bidang Hukum Tata Negara berbasis nilai-nilai keindonesiaan dan keislaman."
          </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
          @foreach([['fas fa-gavel','Legal Drafter','Mencetak perancang peraturan perundang-undangan dan dokumen hukum yang terampil'],['fas fa-balance-scale','Konstitusionalis','Mengembangkan analisis ketatanegaraan yang kritis dan berbasis nilai Islam'],['fas fa-shield-alt','Advokasi Hukum','Menjunjung tinggi keadilan dan hukum dalam setiap pembelaan masyarakat']] as $poin)
          <div class="p-5 bg-gray-50 rounded-2xl text-center space-y-2">
            <div class="w-11 h-11 bg-teal-100 text-teal-700 rounded-xl flex items-center justify-center mx-auto"><i class="{{ $poin[0] }}"></i></div>
            <h4 class="font-bold text-gray-800 text-sm">{{ $poin[1] }}</h4>
            <p class="text-xs text-gray-500">{{ $poin[2] }}</p>
          </div>
          @endforeach
        </div>
      </div>

      {{-- MISI --}}
      <div id="content-misi" class="tab-content hidden space-y-4">
        <h2 class="font-bold text-gray-800 text-xl">Misi Keilmuan Program Studi HTN</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach([
            ['fas fa-chalkboard-teacher','Menyelenggarakan pendidikan dan pembelajaran inovatif untuk menghasilkan lulusan KPI yang kompeten di bidang hukum tata negara, hukum administrasi negara, dan peradilan.'],
            ['fas fa-flask','Menyelenggarakan penelitian dan pengabdian kepada masyarakat di bidang Hukum Tata Negara.'],
            ['fas fa-globe','Memperluas kerjasama nasional dan internasional di bidang hukum, pemerintahan, dan lembaga negara untuk meningkatkan kompetensi lulusan prodi HTN.'],
            ['fas fa-rocket','Mengembangkan soft skills dan hard skills lulusan KPI terutama di bidang legal drafting, advokasi hukum, dan kemahiran peradilan.']
          ] as $i => $misi)
          <div class="p-5 bg-gray-50 rounded-2xl flex gap-4 items-start">
            <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center flex-shrink-0"><i class="{{ $misi[0] }} text-sm"></i></div>
            <div>
              <span class="text-[10px] font-bold text-teal-600 uppercase tracking-wider">Misi {{ $i + 1 }}</span>
              <p class="text-gray-600 text-sm leading-relaxed mt-1">{{ $misi[1] }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      {{-- TUJUAN --}}
      <div id="content-tujuan" class="tab-content hidden space-y-4">
        <h2 class="font-bold text-gray-800 text-xl">Tujuan Program Studi HTN</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach([
            'Menghasilkan lulusan KPI yang kompeten di bidang Ilmu Hukum Tata Negara serta mampu berdakwah secara efektif di era digital.',
            'Menghasilkan proses perkuliahan, penelitian dan pengabdian kepada masyarakat pada prodi HTN untuk mengembangkan lulusan yang profesional di bidang Hukum Tata Negara.',
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

      {{-- STRATEGI --}}
      <div id="content-strategi" class="tab-content hidden space-y-4">
        <h2 class="font-bold text-gray-800 text-xl">Strategi Program Studi HTN</h2>
        <div class="space-y-3">
          @foreach([
            'Meningkatkan standar mutu pendidikan, pembelajaran, penelitian dan pengabdian kepada masyarakat dalam bidang Hukum Tata Negara yang berintegritas dan modern.',
            'Meningkatkan capaian prestasi dan lulusan mahasiswa prodi HTN pada tingkat nasional dan internasional di bidang komunikasi dan media Islam.',
            'Meningkatkan layanan kelembagaan prodi HTN dan kerjasama dengan media massa serta lembaga penyiaran dalam/luar negeri.',
            'Meningkatkan kualifikasi dan kompetensi dosen dalam menguasai materi penelitian dan pengabdian di bidang hukum tata negara dan hukum acara peradilan.',
            'Meningkatkan kualitas sarana prasarana laboratorium peradilan semu (moot court) dan klinik hukum untuk mendukung proses pembelajaran KPI.'
          ] as $i => $strategi)
          <div class="p-4 bg-gray-50 rounded-xl flex items-start gap-4">
            <div class="w-8 h-8 rounded-full bg-teal-600 text-white text-xs font-bold flex items-center justify-center flex-shrink-0 mt-0.5">{{ $i + 1 }}</div>
            <p class="text-gray-700 text-sm leading-relaxed">{{ $strategi }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</div>

<script>
function switchTab(tabId) {
  document.querySelectorAll('.tab-content').forEach(c => { c.classList.add('hidden'); c.classList.remove('block'); });
  document.querySelectorAll('.tab-btn').forEach(b => { b.classList.remove('text-teal-700','border-teal-700'); b.classList.add('text-gray-400','border-transparent'); });
  const ac = document.getElementById('content-' + tabId);
  if (ac) { ac.classList.remove('hidden'); ac.classList.add('block'); }
  const ab = document.getElementById('tab-' + tabId);
  if (ab) { ab.classList.remove('text-gray-400','border-transparent'); ab.classList.add('text-teal-700','border-teal-700'); }
}
</script>
@endsection

