<?= $this->extend('layout/pimpinan_template') ?>
<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 px-6 py-6 font-sans text-slate-800">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">
                Dashboard Pimpinan
            </h1>
            <p class="text-slate-500 mt-1 text-sm">
                Ringkasan pengukuran kinerja global <span class="font-semibold text-slate-700">Politeknik Negeri Bandung</span>
            </p>
            
            <?php if (isset($tahunAktif) && $tahunAktif): ?>
                <div class="mt-3 inline-flex items-center px-3 py-1 rounded-full bg-blue-50 border border-blue-200 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-blue-600 mr-2 animate-pulse"></span>
                    <span class="text-xs font-semibold text-blue-800 uppercase tracking-wide">
                        TA <?= esc($tahunAktif['tahun']) ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex items-center gap-4 self-end md:self-center">
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center gap-3 p-1.5 pr-3 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-300 group">
                    <div class="relative">
                        <img src="<?= base_url('uploads/profile/' . (session('foto') ?? 'default.png')) ?>" 
                             class="w-9 h-9 rounded-lg object-cover ring-2 ring-slate-100 group-hover:ring-blue-100 transition-all border border-slate-200">
                        <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="hidden sm:block text-left">
                        <p class="text-xs font-bold text-slate-700 leading-tight tracking-wide uppercase"><?= session('nama') ?></p>
                        <p class="text-[10px] text-slate-400 font-medium tracking-wider uppercase">Pimpinan</p>
                    </div>
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-transition style="display: none;" 
                     class="absolute right-0 mt-3 w-52 bg-white border border-slate-100 shadow-xl rounded-2xl z-50 overflow-hidden ring-1 ring-black/5">
                    <div class="p-2 space-y-1">
                        <a href="<?= base_url('pimpinan/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-blue-50 hover:text-blue-700 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            Profil Saya
                        </a>
                        <hr class="border-slate-100 mx-2">
                        <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-rose-600 hover:bg-rose-50 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            Keluar Sistem
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-blue-300 transition-all">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total PIC Aktif</p>
                <h3 class="text-3xl font-black text-slate-800"><?= number_format($totalPic ?? 0) ?></h3>
            </div>
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-violet-300 transition-all">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Indikator Kinerja</p>
                <h3 class="text-3xl font-black text-slate-800"><?= number_format($totalIndikator ?? 0) ?></h3>
            </div>
            <div class="w-14 h-14 bg-violet-50 text-violet-600 rounded-xl flex items-center justify-center group-hover:bg-violet-600 group-hover:text-white transition-all">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h4 class="text-sm font-bold text-slate-800 uppercase tracking-widest mb-6 flex items-center gap-2">
            <span class="w-1 h-5 bg-blue-600 rounded-full"></span>
            Aksi Cepat Pimpinan
        </h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="<?= site_url('pimpinan/pengukuran') ?>" class="flex items-center gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-blue-400 hover:shadow-md transition-all group">
                <div class="p-3 rounded-xl bg-white text-blue-600 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <div>
                    <span class="block text-sm font-bold text-slate-800">Laporan Capaian</span>
                    <span class="text-[10px] text-slate-400 uppercase font-bold tracking-tight">Monitoring Realisasi Global</span>
                </div>
            </a>

            <a href="<?= site_url('pimpinan/profile') ?>" class="flex items-center gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-slate-400 hover:shadow-md transition-all group">
                <div class="p-3 rounded-xl bg-white text-slate-600 shadow-sm group-hover:bg-slate-800 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <div>
                    <span class="block text-sm font-bold text-slate-800">Profil Akun</span>
                    <span class="text-[10px] text-slate-400 uppercase font-bold tracking-tight">Pengaturan Identitas</span>
                </div>
            </a>
        </div>
    </div>

    <div class="mt-12 py-6 border-t border-slate-200 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-900 rounded flex items-center justify-center font-bold text-white text-[10px]">KT</div>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                © <?= date('Y') ?> KINETRACK — POLBAN
            </p>
        </div>
        <span class="text-[10px] px-2 py-1 bg-slate-100 rounded text-slate-400 font-bold uppercase tracking-tighter">Pimpinan Mode</span>
    </div>

</div>

<?= $this->endSection() ?>