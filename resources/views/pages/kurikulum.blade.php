@extends('layouts.app')

@section('content')
<div class="space-y-10">

  {{-- Intro --}}
  <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm space-y-4">
    <div class="flex items-start gap-4">
      <div class="w-14 h-14 bg-teal-600 text-white rounded-2xl flex items-center justify-center text-xl shadow-lg flex-shrink-0">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div>
        <h2 class="font-bold text-gray-800 text-xl">Kurikulum S1 Hukum Tata Negara</h2>
        <p class="text-gray-500 text-sm mt-1 leading-relaxed">Kurikulum HTN dirancang untuk menghasilkan lulusan yang kompeten dalam analisis ketatanegaraan, penyusunan peraturan perundang-undangan (legal drafting), dan advokasi hukum. Beban studi diselesaikan dalam 8 semester (4 tahun).</p>
      </div>
    </div>
  </div>

  {{-- Semester Map --}}
  <div class="space-y-4">
    <h3 class="font-bold text-gray-800 text-lg">Distribusi Mata Kuliah Per Semester</h3>

    @php
    $semesters = [
      1 => ['Pengantar Ilmu Hukum', 'Pengantar Hukum Indonesia', 'Ilmu Negara', 'Pancasila & Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris', 'Bahasa Arab I'],
      2 => ['Hukum Tata Negara I', 'Hukum Administrasi Negara I', 'Hukum Perdata', 'Hukum Pidana', 'Hukum Islam', 'Fiqih Ibadah', 'Bahasa Arab II'],
      3 => ['Hukum Tata Negara II', 'Hukum Administrasi Negara II', 'Hukum Acara Perdata', 'Hukum Acara Pidana', 'Hukum Konstitusi', 'Tafsir Ayat Ahkam', 'Hadits Ahkam'],
      4 => ['Hukum Acara Mahkamah Konstitusi', 'Hukum Acara Peradilan Tata Usaha Negara', 'Hukum Kepegawaian', 'Hukum Pemerintahan Daerah', 'Perbandingan HTN', 'Ushul Fiqih'],
      5 => ['Metodologi Penelitian Hukum', 'Perancangan Peraturan Perundang-undangan (Legal Drafting)', 'Sistem Peradilan Indonesia', 'Hukum Acara Peradilan Agama', 'Hukum Internasional'],
      6 => ['Klinik Hukum & Legal Drafting', 'Praktik Kemahiran Hukum (Peradilan Semu)', 'Etika Profesi Hukum', 'KKN', 'Kapita Selekta HTN'],
      7 => ['PPL / Magang (Lembaga Negara / Peradilan)', 'Seminar Proposal Skripsi', 'Tugas Akhir (Pra-Proposal)'],
      8 => ['Skripsi', 'Ujian Komprehensif', 'Munaqasah'],
    ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      @foreach($semesters as $sem => $matkul)
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="bg-teal-700 px-5 py-3 flex items-center gap-3">
          <span class="text-white font-black text-lg">Semester {{ $sem }}</span>
          <span class="ml-auto text-[11px] text-teal-200 font-semibold bg-white/10 px-2.5 py-0.5 rounded-full">{{ count($matkul) }} MK</span>
        </div>
        <div class="px-5 py-4 space-y-1.5">
          @foreach($matkul as $mk)
          <div class="flex items-center gap-2.5 text-sm text-gray-700">
            <i class="fas fa-book-open text-teal-500 text-[11px] flex-shrink-0"></i>
            {{ $mk }}
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- Download CTA --}}
  <div class="bg-gray-100/70 border border-gray-200/50 rounded-3xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
    <div class="flex items-center gap-4">
      <div class="w-14 h-14 bg-red-500 text-white rounded-2xl flex items-center justify-center text-xl shadow-lg shadow-red-500/10">
        <i class="fas fa-file-pdf"></i>
      </div>
      <div>
        <h4 class="font-bold text-gray-800 text-lg">Dokumen Lengkap Kurikulum HTN</h4>
        <p class="text-sm text-gray-500">Unduh dokumen resmi struktur kurikulum dalam format PDF.</p>
      </div>
    </div>
    <a href="https://drive.google.com/file/d/1Xh-8eYSYaGyTPKhzxoENRqqnvY7ydzk5/view?usp=sharing" target="_blank" class="w-full md:w-auto bg-teal-700 hover:bg-teal-800 text-white font-bold px-8 py-3.5 rounded-xl text-sm shadow transition-colors flex items-center justify-center gap-2">
      <i class="fas fa-cloud-download-alt"></i> Download PDF Kurikulum
    </a>
  </div>

</div>
@endsection

