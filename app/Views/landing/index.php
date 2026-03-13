<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KINETRACK – Sistem e-Kinerja</title>

  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        fontFamily: { sans: ["Inter", "sans-serif"] },
        extend: {
          colors: {
            polbanBlue: "#1D2F83",
            polbanOrange: "#F58025",
            polbanDark: "#121B4A",
            polbanLight: "#F8FAFC",
          },
        },
      },
    };
  </script>

  <style>
    .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .glass-nav { backdrop-filter: blur(12px); background: rgba(255, 255, 255, 0.9); }
    .hero-pattern {
      background-color: #1D2F83;
      background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
      background-size: 40px 40px;
    }
  </style>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">

<nav class="fixed top-0 w-full z-50 glass-nav border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <div class="bg-polbanBlue p-2 rounded-lg shadow-inner">
            <i data-lucide="activity" class="text-white w-6 h-6"></i>
        </div>
        <span class="font-black text-2xl tracking-tighter text-polbanBlue uppercase">Kine<span class="text-polbanOrange">track</span></span>
    </div>

    <div class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-600">
      <a href="#solusi" class="hover:text-polbanBlue transition-colors">Solusi</a>
      <a href="#alur" class="hover:text-polbanBlue transition-colors">Alur Kerja</a>
      <a href="#peran" class="hover:text-polbanBlue transition-colors">Akses Role</a>
      <a href="<?= base_url('login') ?>" class="bg-polbanOrange text-white px-6 py-2.5 rounded-full shadow-lg shadow-orange-500/30 hover:bg-orange-600 transition-all active:scale-95">
        Masuk Dashboard
      </a>
    </div>
  </div>
</nav>

<section class="hero-pattern pt-44 pb-32 text-white overflow-hidden relative">
  <div class="max-w-6xl mx-auto px-6 relative z-10">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="reveal">
            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-1.5 rounded-full mb-6">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-ping"></span>
                <span class="text-xs font-bold tracking-widest uppercase">E-Kinerja</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black leading-[1.1] mb-8">
                Pantau <span class="text-polbanOrange underline decoration-4 underline-offset-8">Indikator</span> Kinerja Secara Akurat.
            </h1>
            <p class="text-lg text-slate-300 mb-10 leading-relaxed max-w-lg">
                Sistem pengelolaan Kinerja terpadu untuk Jurusan dan Prodi. 
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="<?= base_url('login') ?>" class="bg-white text-polbanBlue px-8 py-4 rounded-xl font-black shadow-2xl hover:bg-slate-100 transition-all">
                    Buka Laporan Sekarang
                </a>
            </div>
        </div>
        <div class="hidden lg:block reveal">
            <div class="relative bg-white/5 p-4 rounded-[2rem] border border-white/10 backdrop-blur-sm">
                <div class="bg-white rounded-2xl p-6 shadow-2xl">
                    <div class="flex justify-between items-center mb-6">
                        <div class="h-4 w-32 bg-slate-100 rounded"></div>
                        <div class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black rounded-full">ACTIVE PERIOD: TW-3</div>
                    </div>
                    <div class="space-y-4">
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="flex justify-between text-xs font-bold text-slate-400 mb-2">
                                <span>REPRESENTASI PROGRES</span>
                                <span class="text-polbanBlue text-sm">85%</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
                                <div class="bg-polbanBlue h-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                                <p class="text-[10px] font-bold text-blue-400 uppercase">Target PK</p>
                                <p class="text-lg font-black text-polbanBlue">100 Unit</p>
                            </div>
                            <div class="p-3 bg-orange-50 rounded-lg border border-orange-100">
                                <p class="text-[10px] font-bold text-orange-400 uppercase">Realisasi</p>
                                <p class="text-lg font-black text-polbanOrange">85 Unit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<section id="solusi" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 reveal">
            <div class="max-w-2xl">
                <h2 class="text-polbanOrange font-black tracking-widest uppercase text-sm mb-3">Kinetrack Features</h2>
                <p class="text-4xl font-black text-polbanBlue">Solusi Manajemen Kinerja End-to-End</p>
            </div>
            <p class="text-slate-500 font-medium md:text-right">Akurasi data dari unit terkecil<br>hingga tingkat Institusi.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-polbanBlue/20 transition-all reveal">
                <div class="w-12 h-12 bg-polbanBlue/10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="users" class="text-polbanBlue"></i>
                </div>
                <h3 class="font-black text-xl mb-4 text-polbanBlue">Manajemen PIC & Unit</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pemetaan otomatis Role Staff/Atasan berdasarkan jabatan di tingkat Jurusan atau Program Studi secara akurat.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-polbanBlue/20 transition-all reveal">
                <div class="w-12 h-12 bg-orange-500/10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="clock" class="text-polbanOrange"></i>
                </div>
                <h3 class="font-black text-xl mb-4 text-polbanBlue">Akses Triwulan Cerdas</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Sistem membuka/mengunci input triwulan secara otomatis berdasarkan waktu atau kontrol penuh di tangan Admin.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-polbanBlue/20 transition-all reveal">
                <div class="w-12 h-12 bg-green-500/10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="shield-check" class="text-green-600"></i>
                </div>
                <h3 class="font-black text-xl mb-4 text-polbanBlue">Validasi & Report</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Hasilkan laporan PDF (Report) secara otomatis hanya jika realisasi telah mencapai 100% dari target triwulan.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="alur" class="py-24 bg-slate-900 text-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 reveal">
            <h2 class="text-3xl md:text-4xl font-black mb-6">Alur Pengukuran Kinerja</h2>
            <p class="text-slate-400">Siklus pemantauan dan evaluasi capaian target organisasi secara periodik.</p>
        </div>

        <div class="relative flex flex-col md:flex-row items-start justify-between gap-8 reveal">
            <div class="hidden md:block absolute top-12 left-0 w-full h-1 bg-gradient-to-r from-orange-500 via-blue-500 to-emerald-500 opacity-20"></div>
            
            <div class="relative z-10 w-full md:w-1/4">
                <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 h-full hover:border-orange-500/50 transition-colors">
                    <span class="text-xs font-black text-orange-500 uppercase tracking-wider">Tahap 1</span>
                    <h4 class="font-bold my-2 text-lg">Penugasan PIC</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Admin mengatur Manajemen Triwulan (Lock/Unlock) dan menetapkan indikator kinerja kepada PIC terkait.</p>
                </div>
            </div>

            <div class="relative z-10 w-full md:w-1/4">
                <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 h-full hover:border-blue-500/50 transition-colors">
                    <span class="text-xs font-black text-blue-400 uppercase tracking-wider">Tahap 2</span>
                    <h4 class="font-bold my-2 text-lg">Pelaporan Capaian</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Staff atau Atasan (PIC) menginput realisasi, progres, kendala, dan strategi tindak lanjut pada triwulan yang aktif.</p>
                </div>
            </div>

            <div class="relative z-10 w-full md:w-1/4">
                <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 h-full hover:border-purple-500/50 transition-colors">
                    <span class="text-xs font-black text-purple-400 uppercase tracking-wider">Tahap 3</span>
                    <h4 class="font-bold my-2 text-lg">Monitoring Visual</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Sistem mengolah data menjadi Grafik Kinerja untuk membandingkan target vs realisasi secara tahunan dan triwulanan.</p>
                </div>
            </div>

            <div class="relative z-10 w-full md:w-1/4">
                <div class="bg-emerald-600 p-6 rounded-2xl h-full shadow-lg shadow-emerald-500/20 group hover:bg-emerald-500 transition-all">
                    <span class="text-xs font-black text-emerald-100 uppercase tracking-wider">Selesai</span>
                    <h4 class="font-bold my-2 text-lg">Evaluasi & Arahan</h4>
                    <p class="text-xs text-emerald-50 font-medium leading-relaxed">Pimpinan memberikan rekomendasi strategis yang dapat langsung dilihat oleh PIC untuk tindak lanjut periode berikutnya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="peran" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 reveal">
            <h2 class="text-3xl font-black text-slate-900 mb-4">Aksesibilitas Multi-Role</h2>
            <div class="h-1 w-20 bg-polbanOrange mx-auto rounded-full"></div>
            <p class="text-slate-500 mt-4 max-w-2xl mx-auto text-sm">Pembagian hak akses yang terintegrasi untuk memastikan transparansi dan akuntabilitas kinerja di setiap level organisasi.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-8 border-2 border-blue-600 bg-blue-50/30 rounded-3xl reveal relative overflow-hidden group hover:bg-blue-600 transition-all duration-300">
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors">
                        <i data-lucide="crown" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-xl font-black text-blue-700 mb-4 group-hover:text-white transition-colors">Pimpinan</h4>
                    <ul class="space-y-3 text-sm font-medium text-slate-600 group-hover:text-blue-50 transition-colors">
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 shrink-0 mt-0.5 group-hover:text-white"></i> Memberikan Rekomendasi</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 shrink-0 mt-0.5 group-hover:text-white"></i> Evaluasi Seluruh PIC</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 shrink-0 mt-0.5 group-hover:text-white"></i> Pemantauan Capaian Global</li>
                    </ul>
                </div>
            </div>

            <div class="p-8 border-2 border-slate-200 bg-slate-50/50 rounded-3xl reveal relative overflow-hidden group hover:bg-slate-800 transition-all duration-300">
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-slate-200 text-slate-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/10 group-hover:text-white transition-colors">
                        <i data-lucide="settings" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-xl font-black text-slate-800 mb-4 group-hover:text-white transition-colors">Admin Utama</h4>
                    <ul class="space-y-3 text-sm font-medium text-slate-600 group-hover:text-slate-300 transition-colors">
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-slate-400 shrink-0 mt-0.5 group-hover:text-white"></i> Manajemen Tahun Anggaran</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-slate-400 shrink-0 mt-0.5 group-hover:text-white"></i> Kendali Lock/Unlock Data</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-slate-400 shrink-0 mt-0.5 group-hover:text-white"></i> Audit Log Menyeluruh</li>
                    </ul>
                </div>
            </div>

            <div class="p-8 border-2 border-indigo-600 bg-indigo-50/30 rounded-3xl reveal relative overflow-hidden group hover:bg-indigo-600 transition-all duration-300">
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors">
                        <i data-lucide="user-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-xl font-black text-indigo-700 mb-4 group-hover:text-white transition-colors">Atasan</h4>
                    <ul class="space-y-3 text-sm font-medium text-slate-600 group-hover:text-indigo-50 transition-colors">
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-indigo-600 shrink-0 mt-0.5 group-hover:text-white"></i> Monitoring Progres PIC</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-indigo-600 shrink-0 mt-0.5 group-hover:text-white"></i> Verifikasi Dokumen Kerja</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-indigo-600 shrink-0 mt-0.5 group-hover:text-white"></i> Dashboard Performa Unit</li>
                    </ul>
                </div>
            </div>

            <div class="p-8 border-2 border-emerald-600 bg-emerald-50/30 rounded-3xl reveal relative overflow-hidden group hover:bg-emerald-600 transition-all duration-300">
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors">
                        <i data-lucide="user" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-xl font-black text-emerald-700 mb-4 group-hover:text-white transition-colors">Pelaksana</h4>
                    <ul class="space-y-3 text-sm font-medium text-slate-600 group-hover:text-emerald-50 transition-colors">
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5 group-hover:text-white"></i> Input Realisasi & Kendala</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5 group-hover:text-white"></i> Unggah File Pendukung</li>
                        <li class="flex items-start gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5 group-hover:text-white"></i> Laporan Pengukuran</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="bg-slate-950 py-20 text-white border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-12 items-center text-center md:text-left">
            <div class="space-y-4">
                <div class="bg-white p-3 rounded-2xl inline-block shadow-xl shadow-white/5">
                    <i data-lucide="activity" class="text-polbanBlue w-8 h-8"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-black tracking-tighter italic">KINE<span class="text-polbanOrange">TRACK</span></h2>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                        Sistem Informasi e-Kinerja & Manajemen Dokumen Terintegrasi. 
                        Mewujudkan transparansi dan akuntabilitas di lingkungan Politeknik Negeri Bandung.
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center gap-4">
                <h4 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2">Tautan Resmi</h4>
                <div class="flex gap-4">
                    <a href="https://www.polban.ac.id/" target="_blank" title="Website Resmi Polban"
                       class="w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center hover:bg-polbanBlue hover:-translate-y-1 transition-all shadow-lg group">
                        <i data-lucide="globe" class="w-5 h-5 text-slate-300 group-hover:text-white"></i>
                    </a>
                    <a href="https://www.instagram.com/politekniknegeribandung?igsh=MTc3bXdvNHRyY3VweA==" target="_blank" title="Instagram Polban"
                       class="w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center hover:bg-pink-600 hover:-translate-y-1 transition-all shadow-lg group">
                        <i data-lucide="instagram" class="w-5 h-5 text-slate-300 group-hover:text-white"></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-end gap-4">
                <h4 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2">Hubungi Pengembang</h4>
                <a href="https://wa.me/6285189732566" target="_blank"
                   class="flex items-center gap-3 bg-green-600/10 border border-green-600/20 px-6 py-3 rounded-2xl hover:bg-green-600 hover:shadow-green-600/20 hover:shadow-2xl transition-all group">
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-green-500 group-hover:text-green-100 uppercase leading-none mb-1">Author / Developer</p>
                        <p class="text-sm font-black text-white leading-none">Kiwari Tech</p>
                    </div>
                    <i data-lucide="message-circle" class="w-6 h-6 text-green-500 group-hover:text-white"></i>
                </a>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 text-xs font-medium uppercase tracking-widest">
                © <?= date('Y') ?> Politeknik Negeri Bandung.
            </p>
            <div class="flex gap-6 text-[10px] font-bold text-slate-600 uppercase tracking-tighter">
                <span class="hover:text-slate-400 cursor-default transition-colors">Security Verified</span>
                <span class="hover:text-slate-400 cursor-default transition-colors">Performance Optimized</span>
            </div>
        </div>
    </div>
</footer>

<script>
  // Inisialisasi Lucide Icons
  lucide.createIcons();

  // Animasi Reveal saat scroll
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  // Navbar shadow on scroll
  window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 20) {
      nav.classList.add('shadow-xl', 'py-3');
    } else {
      nav.classList.remove('shadow-xl', 'py-3');
    }
  });
</script>

</body>
</html>